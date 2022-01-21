<?php


namespace App\Repositories\Order\InventoryExtractionCenter;


use App\DataTransferObjects\Orders\InventoryExtractionCenterVO;
use App\Models\DetailStockMovementHistory;
use App\Models\Inventory;
use App\Models\OrdersDetail;
use App\Models\Stock;
use App\Models\StockMovementHistory;
use App\Repositories\Order\InventoryExtractionCenter\contracts\InventoryExtractionCenterInterface;

class InventoryExtractionCenterRepository implements InventoryExtractionCenterInterface
{
    function extractDetails(InventoryExtractionCenterVO $InventoryExtractionCenterVO){

        if($InventoryExtractionCenterVO->getIsInt()){
          $this->StockInInventary($InventoryExtractionCenterVO);
        }

        if($InventoryExtractionCenterVO->getIsOut()){
          $this->StockOutInventary($InventoryExtractionCenterVO);
        }

    }

    private function StockOutInventary(InventoryExtractionCenterVO $InventoryExtractionCenterVO){

        $stock = Stock::where('id',$InventoryExtractionCenterVO->getStockID())->first();

        $stock_in = $stock->stock_in - $InventoryExtractionCenterVO->getQuantity();
        $stock_out = $stock->stock_out + $InventoryExtractionCenterVO->getQuantity();

        $StockMovementHistoryID = $this->updateStock(
            $stock_in,
            $stock_out,
            $InventoryExtractionCenterVO
        );

        $this->updateInventory(
            $StockMovementHistoryID,
            $InventoryExtractionCenterVO
        );


    }

    private function StockInInventary(InventoryExtractionCenterVO $InventoryExtractionCenterVO){

        $stock = Stock::where('id',$InventoryExtractionCenterVO->getStockID())->first();

        $stock_in = $stock->stock_in + $InventoryExtractionCenterVO->getQuantity();
        $stock_out = $stock->stock_out - $InventoryExtractionCenterVO->getQuantity();

        $StockMovementHistoryID = $this->updateStock(
            $stock_in,
            $stock_out,
            $InventoryExtractionCenterVO
        );

        $this->updateInventory(
            $StockMovementHistoryID,
            $InventoryExtractionCenterVO
        );

    }


    private function updateStock(?int $in, ?int $out, InventoryExtractionCenterVO $InventoryExtractionCenterVO):int {
        Stock::where('id', $InventoryExtractionCenterVO->getStockID())->update(['stock_in' => $in, 'stock_out' => $out]);

       return StockMovementHistory::create([
                "quantity"=>$InventoryExtractionCenterVO->getQuantity(),
                "is_in"=> $InventoryExtractionCenterVO->getIsInt(),
                "is_out"=> $InventoryExtractionCenterVO->getIsOut(),
                "stores_id"=>$InventoryExtractionCenterVO->getStoresId(),
                "stocks_id"=>$InventoryExtractionCenterVO->getStockID(),
                "orders_detail_id"=>$InventoryExtractionCenterVO->getOrderDetailID(),
                "order_id"=>$InventoryExtractionCenterVO->getOrderID()
              ])->id;
    }

    private function updateInventory(int $StockMovementHistoryId, InventoryExtractionCenterVO $InventoryExtractionCenterVO){

        foreach ($InventoryExtractionCenterVO->getInventoryList() as $id){

            if($InventoryExtractionCenterVO->getIsOut()){
              Inventory::where('id',$id)
                ->update([
                    "is_sold" => "1",
                    "order_id" => $InventoryExtractionCenterVO->getOrderID(),
                    "orders_detail_id"=>$InventoryExtractionCenterVO->getOrderDetailID()
                ]);
            }

            if($InventoryExtractionCenterVO->getIsInt()){
              Inventory::where('id',$id)
                ->update([
                    "is_sold" => "0",
                    "order_id" => $InventoryExtractionCenterVO->getOrderID(),
                    "orders_detail_id"=>$InventoryExtractionCenterVO->getOrderDetailID()
                ]);
            }


            DetailStockMovementHistory::create([
                "stock_movement_history_id"=>$StockMovementHistoryId,
                "inventory_id"=>$id,
                "stores_id"=>$InventoryExtractionCenterVO->getStoresId(),
                "orders_detail_id"=>$InventoryExtractionCenterVO->getOrderDetailID()
            ]);

        }

    }
}
