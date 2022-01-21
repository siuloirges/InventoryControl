<?php

namespace App\Console\Commands\Order;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\Models\Opportunity;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use Illuminate\Console\Command;
use Symfony\Component\HttpFoundation\Response;


class CreateOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:order-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear orden que viene de mongoDB';

    /**
     * @var GetOrderUseCaseInterface
     */
    private $getOrderUseCase;

    /**
     * @param GetOrderUseCaseInterface $getOrderUseCase
     */

    public function __construct(
        GetOrderUseCaseInterface $getOrderUseCase
    )
    {
        parent::__construct();
        $this->getOrderUseCase = $getOrderUseCase;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $opportunities = Opportunity::all();
        foreach ($opportunities as $opportunity) {

            $list_product = $opportunity->list_product;

            $listProductsfinal = [];
            for ($i=0; $i < sizeof($list_product);$i++) {

                $this->info($list_product[$i]->products_id);
//                $listGetOrder = new ListProductGetOrderDTO();
//                $listGetOrder->setProductId($list_product[$i]);
//                $listGetOrder->setQuantity($list_product[$i]);
//                array_push($listProductsfinal, $listGetOrder);
            }

            $this->info($listProductsfinal);


            $getOrder = new GetOrderRequestDTO();
            $getOrder->setClientId($opportunity->client_id);
            $getOrder->setUserId($opportunity->user_id);
            $getOrder->setPhone($opportunity->phone);
            $getOrder->setAddress($opportunity->address);
            $getOrder->setMunicipalityId($opportunity->municipality);
            $getOrder->setDepartmentId($opportunity->department);
//            $getOrder->setListProduct($opportunity->list_product);
            $getOrder->setDescription($opportunity->description);
            $getOrder->setWhoReceives($opportunity->who_receives);
            $this->getOrderUseCase->save($getOrder);

//           if ($response->status() == Response::HTTP_OK) {
//               $this->info($response->content());
//               $opportunity->delete();
//           }

            $this->info("ERROR");
        }

        return 0;
    }
}
