<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\Http\Requests\GetOrderRequest;
use App\Models\Inventory;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class GetOrder
 * @package App\Http\Controllers
 * @author Victor Barrera <vbarrera@outlook.com>
 */
class GetOrder extends ApiController
{
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
        parent::__construct();
        $this->getOrderUseCase = $getOrderUseCase;
    }

    /**
     * @param GetOrderRequest $request
     * @return JsonResponse
     */
    public function __invoke(GetOrderRequest $request): JsonResponse
    {


        $listProducts = [];
        foreach ($request->list_product as $product) {
            $listGetOrder = new ListProductGetOrderDTO();
            $listGetOrder->setProductId($product['products_id']);
            $listGetOrder->setQuantity($product['quantity']);
            array_push($listProducts, $listGetOrder);
        }

        $getOrder = new GetOrderRequestDTO();
        $getOrder->setClientId($request->client_id);
        $getOrder->setUserId($request->user_id);
        $getOrder->setPhone($request->phone);
        $getOrder->setAddress($request->address);
        $getOrder->setMunicipalityId($request->municipality);
        $getOrder->setListProduct($listProducts);
        $getOrder->setDepartmentId($request->department);
        $getOrder->setDescription($request->description);
        $getOrder->setWhoReceives($request->who_receives);

        return $this->getOrderUseCase->save($getOrder);
    }
}
