<?php

namespace App\UseCase\Order\Contracts;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use Illuminate\Http\JsonResponse;

interface GetOrderUseCaseInterface
{
    /**
     * @param GetOrderRequestDTO $orderRequestDTO
     * @return array
     */
    public function save(GetOrderRequestDTO $orderRequestDTO): array;

    /**
     * @param int $orderId
     *
     */
    public function updateCancel(int $orderId);

    /**
     * @param int $orderId
     */

    public function nextStatus(int $orderId);

    /**
     * @param int $orderId
     */

    public function toCompletedOrder(int $orderId);
}
