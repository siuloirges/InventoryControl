<?php


namespace App\Repositories\Asesor\CalculateCommission;


use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\PendingOrderDetails;
use App\Models\Products;
use App\Repositories\Asesor\CalculateCommission\Contracts\CalculateCommissionInterface;

class CalculateCommissionRepository implements CalculateCommissionInterface
{
    function calculateCommissionByOrderId($orderId){

        $commissionOrder = 0;
        $pendingOrderDetails = PendingOrderDetails::where("orders_id", "=", $orderId)->first();
        $pendinOrderDetail = json_decode($pendingOrderDetails->order_detail);

        foreach ($pendinOrderDetail as $detail) {

            $product = Products::where('id',$detail->productId)->first();
            $commissionOrder += $product->commission_sale * $detail->quantity;

        }

        Orders::where('id',$orderId)->update([
            'commission' => $commissionOrder
        ]);

    }
}
