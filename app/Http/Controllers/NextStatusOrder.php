<?php

namespace App\Http\Controllers;

use App\Http\Requests\NextStatusRequest;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use Symfony\Component\HttpFoundation\Response as Response;

class NextStatusOrder extends Controller
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

    public function __invoke(NextStatusRequest $request)
    {

        try{
            return response()->json(
                [
                    'success' => true,
                    'data' =>  $this->getOrderUseCase->nextStatus($request->orders_id),
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
