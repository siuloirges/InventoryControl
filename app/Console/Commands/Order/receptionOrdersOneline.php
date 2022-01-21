<?php

namespace App\Console\Commands\Order;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\paymentGatewayAgent;
use App\Models\PaymentMethods;
use App\Models\productKitDetail;
use App\Models\Products;
use App\Models\ReservedOrders;
use App\Models\Stores;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\UseCase\Order\GetOrderUseCase;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use PHPUnit\Exception;

class receptionOrdersOneline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:receptionOrdersOneline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $orderRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        GetOrderUseCase $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
        parent::__construct();
    }

    /**
     * @param EloquentOrderRepositoryInterface $orderRepository
     */

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//      dd( ReservedOrders::get() );

        $maxOrders = 25;

        for($i = 0; $i<$maxOrders; $i++){

            try{

                $Orders = ReservedOrders::orderBy('number_of_attemps', 'asc')->orderBy('order_number', 'asc')->first();

                if( $Orders ){

                    $CurrentOrders = $Orders;

                    //TODO DELETE ORDER
                    $Orders->delete();
                    $rodenBuilt = $this->makeToOrder($CurrentOrders);

                    if($rodenBuilt['success'] == false && ( $CurrentOrders->number_of_attemps < 3 )){
                        $reservedOrders = new ReservedOrders();
                        $reservedOrders->store_identification_number = $CurrentOrders->store_identification_number;
                        $reservedOrders->order_number = $CurrentOrders->order_number;
                        $reservedOrders->list_product = $CurrentOrders->list_product;
                        $reservedOrders->client = $CurrentOrders->client;
                        $reservedOrders->from = $CurrentOrders->from;
                        $reservedOrders->number_of_attemps = intval($CurrentOrders->number_of_attemps??0) + 1;
                        $reservedOrders->success = $rodenBuilt['success'];
//                        $reservedOrders->created_at = "01";
                        $reservedOrders->save();
                    }

                }

                //END PROCESS
                if($Orders == null || $Orders == '[]'){
                    $i += $maxOrders - $i;
                }

            }catch (\Exception $e){
                $this->info($e);
            }

        }

        $this->info("SUCCESS");
        \Log::debug('Success - command:receptionOrdersOneline');
        return 0;
    }


    private function makeToOrder($order){

        try {


          $this->info($order->order_number);

          $storesId = Stores::where('identification_number',$order->store_identification_number)
              ->select('id')
              ->first()
              ->id;

          $list_product = json_decode($order->list_product);
          $listProductsfinal = [];
          foreach ( $list_product as $productItem ){

              $product = Products::where('id',$productItem->product_id)
                  ->select('type','discount_kit','id')
                  ->first();

              if ( $product ){

                  $listGetOrder = new ListProductGetOrderDTO();
                  $listGetOrder->setProductId($productItem->product_id);
                  $listGetOrder->setQuantity($productItem->quantity);

                  if( $product->type == Products::KIT){

                      $listGetOrder->SetIsCombo(true);
                      $listGetOrder->Setkit([
                          "discount"=> $productItem->discount,
                          "kit" => productKitDetail::where( 'products_kit_id', $product->id )
                              ->select('products_id','quantity')
                              ->get()
                      ]);
                      $listGetOrder->SetDiscount(0);

                  }

                  if( $product->type == Products::PRODUCT ){
                      $listGetOrder->SetIsCombo(false);
                      $listGetOrder->SetDiscount($productItem->discount);
                  }

                  array_push($listProductsfinal, $listGetOrder);
              }

          }

          $client = json_decode( $order->client );
          // $store_identification_number = $order->store_identification_number;
          $clientId = $this->GetClient($client,$storesId,$order->from,$order->order_number);
          // dd(paymentGatewayAgent::all());

          $paymentGatewayAgentId = paymentGatewayAgent::scopeGetpaymentGatewayAgentByCode($order->gateway_agent_identifier_code);

          $getOrder = new GetOrderRequestDTO();

          $getOrder->setUserId(null);
          $getOrder->setStoresId($storesId);
          $getOrder->setClientId($clientId);
          $getOrder->setPhone($client->contact_1);
          $getOrder->setListProduct($listProductsfinal);
          $getOrder->setAddress($client->address);
          $getOrder->setShippingAgentId(null);
          $getOrder->setGuideNumber(null);
          $getOrder->setDepartmentId($client->department_id);
          $getOrder->setMunicipalityId($client->municipality_id);
          $getOrder->setWhoReceives(null);
          $getOrder->setReceives_identification_number(null);
          $getOrder->setDescription("##Generada Automaticamente, desde: ".$order->from."##");
          $getOrder->setDiscount(0);
          $getOrder->setPaymentMethods(PaymentMethods::COMPRA_ONLINE);
          $getOrder->setOrderNumber($order->order_number);
          $getOrder->setIsReserved(true);
          $getOrder->setIsTax(false);
          $getOrder->setPaymentGatewayAgentId($paymentGatewayAgentId->id);

          $data = $this->orderRepository->save( $getOrder );

          return $data;

        }catch (\Throwable $e){

            return ['success' => false, 'data' => $e->getMessage()];

        }

    }

    private function GetClient($client,$stores_id,$from,$orderNumber){

        $customerObtained = Customers::whereOr('identification_number',$client->identification_number,)->where('phone', $client->contact_1)->first();

       if($customerObtained){

           $customerObtained->updated(['stores_id'=>$stores_id]);
           return $customerObtained->id;

       }else{

           $clientCreated = Customers::create(
               [
                   'stores_id'=>$stores_id,
                   'name'=>$client->names,
                   'last_name'=>$client->last_names,
                   'address'=>$client->address,
                   'phone'=>$client->contact_1,
                   'email'=>$client->email_1,
                   'identification_number'=>$client->identification_number,
                   'description'=>"##Creado Automaticamente, por la orden: ".$orderNumber.", desde: ".$from."##",
                   'municipality_id'=>$client->municipality_id,
                   'department_id'=>$client->department_id,
                   'type_document_id'=>1
               ]
           );

           return $clientCreated->id;

       }




    }
}
