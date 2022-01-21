<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as Response;

/**
 * class UpdateOrder
 * @author Victor Barrera <vbarrera@merqueo.com>
 */
class UpdateOrder extends ApiController
{
    /**
     * @var GetOrderUseCaseInterface
     */
    private $getOrderUseCase;

    /**
     * @var EloquentOrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @param GetOrderUseCaseInterface $getOrderUseCase
     * @param EloquentOrderRepositoryInterface $orderRepository
     */
    public function __construct(
        GetOrderUseCaseInterface         $getOrderUseCase,
        EloquentOrderRepositoryInterface $orderRepository
    ) {
        parent::__construct();
        $this->getOrderUseCase = $getOrderUseCase;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param UpdateOrderRequest $request
     * @return JsonResponse
     */
    public function __invoke(UpdateOrderRequest $request): JsonResponse
    {
        try {
            if ($request->status == "CANCELADA") {
                $this->getOrderUseCase->updateCancel((int) $request->id);
            }

            if ($response =  $this->orderRepository->findById($request->orders_id)) {
                return response()->json(
                    [
                       'success' => true,
                       'data' => [
                           "order" => $response,
                    ],
                       'message' => 'resolvio la petición'
                   ]
                );
            }

            return  $this->showMessage('No Existe', Response::HTTP_BAD_REQUEST);
        } catch (Exception $exception) {
            return response()->json(
                Response::HTTP_INTERNAL_SERVER_ERROR,
                [
                    'data' => $exception->getMessage(),
                    'success' => false,
                    'message' => 'Fallo de excepción OrdersController@post'
                ]
            );
        }
    }
}
