<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\Http\Requests\ToCompletedOrderRequest;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\PendingOrderDetails;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as Response;

class ToCompletedOrder extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @var GetOrderUseCaseInterface
     */
    private $getOrderUseCase;

    /**
     * @param GetOrderUseCaseInterface $getOrderUseCase
     */
    public function __construct(
        GetOrderUseCaseInterface $getOrderUseCase
    ) {
//        parent::__construct();
        $this->getOrderUseCase = $getOrderUseCase;
    }

    public function __invoke(ToCompletedOrderRequest $request)
    {

        try{

           $data = $this->getOrderUseCase->toCompletedOrder( $request->orders_id );

            return response()->json(
                [
                    'success' => true,
                    'data' => $data,
                    'message' => 'resolvio la petición'
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                [
                    'data' => $e->getMessage(),
                    'success' => false,
                    'message' => 'Fallo de excepción ToCompletedOder@invoke'
                ]
            );
        }



    }
}

