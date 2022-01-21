<?php

namespace App\Console\Commands\Order;

use App\Models\OnelinePaymentStatus;
use App\Models\Orders;
use App\Models\paymentGatewayAgent;
use App\Models\ReservedOrders;


use App\Repositories\OnlinePaymentStatus\Contracts\OnlinePaymentStatusInterface;
use App\Repositories\Order\CheckEpycoStatus\Contracts\CheckEpycoStatusRepositoryInterface;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\UseCase\Order\GetOrderUseCase;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class CheckPaymentStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CheckPaymentStatuses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var CheckEpycoStatusRepositoryInterface
     */
    private $ckeckEpycoRepository;

    /**
     * @var OnlinePaymentStatusInterface
     */
    private $onlinePaymentStatusInterface;


    private $orderRepository;

    const MAX_TIME = 35;
    const MAX_ORDER = 25;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        CheckEpycoStatusRepositoryInterface $ckeckEpycoRepository,
        OnlinePaymentStatusInterface $onlinePaymentStatusInterface,
        GetOrderUseCase $orderRepository
    )
    {
        parent::__construct();
        $this->ckeckEpycoRepository = $ckeckEpycoRepository;
        $this->onlinePaymentStatusInterface = $onlinePaymentStatusInterface;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $checkedOrders = [];

        $maxOrders = self::MAX_ORDER;

        for($i = 0; $i<$maxOrders; $i++){

            $repeated = false;
            $ordersToCheck = Orders::where('is_reserved','1')
                ->where('status','!=',Orders::CANCELADA)
                ->where('online_payment_status','!=',OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_PAGADO)
                ->orderBy('updated_at')
                ->first();

            //END PROCESS LOGIC
            if( $ordersToCheck ){
                array_push($checkedOrders,$ordersToCheck->order_number);
                $array = array_count_values ($checkedOrders);
                if($array[$ordersToCheck->order_number] > 1 || $ordersToCheck == null){
                    $i += $maxOrders - $i;
                    $repeated = true;
                }
            }else{
              $i += $maxOrders - $i;
            }

            if( $ordersToCheck && $repeated == false ){
                $this->DefineOrder($ordersToCheck);
            }

        }

        $this->info("SUCCESS");

        \Log::debug('Success - command:CheckPaymentStatuses');
        return Command::SUCCESS;

    }

    private function DefineOrder($order){

            echo  $order->order_number." ";

        $now = Carbon::now();
        $created_at = $order->created_at;
        $diffInMinutes = $now->diffInMinutes($created_at);
        $payment_gateway_agent =  PaymentGatewayAgent::find($order->payment_gateway_agent_id);

        switch ($payment_gateway_agent->agent_identifier_code) {
            case PaymentGatewayAgent::EPYCO_IDENTIFIER_CODE:

                $data = $this->ckeckEpycoRepository->checkEpycoStatusByOrderNumber($order->order_number);
                $OnelinePaymentStatus = $this->ActualizarEstadoEpayco($data,$order);
                $this->defineCancellation($diffInMinutes,$OnelinePaymentStatus,$order);
                break;
        }

    }

    private function defineCancellation($diffInMinutes, $onlinePaymentStatus,$order){

        $MaxTime = self::MAX_TIME;

        if(
            $diffInMinutes > $MaxTime
            &&
            (
                $onlinePaymentStatus == OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_NO_PAGADO
                ||
                $onlinePaymentStatus == OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_POR_DEFINIR
                ||
                $onlinePaymentStatus == OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_RECHAZADA
                ||
                $onlinePaymentStatus == OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_FALLIDA
                ||
                $onlinePaymentStatus == OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_CANCELADA
                ||
                $onlinePaymentStatus == OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_ABANDONADA
            )
        ){
            $this->ToCancelOrder($order);

        }

    }

    private function ToCancelOrder($order){
        $this->orderRepository->updateCancel($order->id);
    }

    private function ActualizarEstadoEpayco($data,$order):string {

        if($data['status']){

            if($data['code'] == 200){

                $status = $this->onlinePaymentStatusInterface->getCodeByEpaycoCode($data['statusEspyco']);

                Orders::where('id',$order->id)->update([
                    'online_payment_status'=>$status,
                    'payment_gateway_agent_status'=>$data['statusEspyco']
                ]);
                return $status;

            }

            if($data['code'] == 207){

                $estados = "";

                foreach ($data['statusEspyco'] as $index => $item){
//                    $status = $this->onlinePaymentStatusInterface->getCodeByEpaycoCode($item->status);
                    $estados .= "## ".$item->status." - amount: ".$item->amount." ## - ";
                }

                Orders::where('id',$order->id)->update([
                    'online_payment_status'=>OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_MULTIPLES_INTENTOS,
                    'payment_gateway_agent_status'=>$estados
                ]);

                return OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_MULTIPLES_INTENTOS;

            }

            if($data['code'] == 404){

                Orders::where('id',$order->id)->update([
                    'online_payment_status'=>OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_NO_PAGADO,
                    'payment_gateway_agent_status'=>"Noy hay pagos"
                ]);

                return OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_NO_PAGADO;
            }

        }

        if(!$data['status']){

            \Log::debug('ERROR - command:CheckPaymentStatuses orden: '.$order->order_number.'ERROR: '. $data['messague']);
            $this->info("ERROR CON ORDEN");

        }
    }
}
