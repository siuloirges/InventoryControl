<?php

namespace App\Repositories\Order\Contracts;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\DataTransferObjects\Orders\OrderApplyDiscountDTO;
use App\Models\Orders;

/**
 * interface EloquentOrderRepositoryInterface
 * @author Victor Barrera <vbarrera@outlook.com>
 */
interface EloquentOrderRepositoryInterface
{
    /**
     * @param ListProductGetOrderDTO[] $listProductGetOrderDTO
     * @param int $orderID
     * @param bool $update
     * @return array
     */
    public function toDiscount(array $listProductGetOrderDTO, int $orderID, bool $update = false): array;

    /**
     * @param array $toDiscountData
     * @param int $orderID
     * @param int $total_order
     * @param bool $update
     * @param int $discount
     * @param bool $is_tax
     * @return mixed
     */
    public function defineState(array $toDiscountData, int $orderID, int $total_order, bool $update = false,bool $is_tax = false);

//    /**
//     * @param int $orderID
//     * @param OrderApplyDiscountDTO $applyDiscountDTO
//     * @return bool
//     */
//    private function updateApplyDiscount(int $orderID, OrderApplyDiscountDTO $applyDiscountDTO): bool;

    /**
     * @param int $orderID
     * @param string $status
     * @return bool
     */
    public function updateStatus(int $orderID, string $status): bool;

    /**
     * @param int $orderId
     * @return Orders|null
     */
    public function findById(int $orderId): ?Orders;

    /**
     * @param GetOrderRequestDTO $orderRequestDTO
     *
     */
    public function decodeInicialOrderFormat(GetOrderRequestDTO $orderRequestDTO);
}
