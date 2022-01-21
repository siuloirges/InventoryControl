<?php

namespace App\Repositories\Order;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\InventoryExtractionCenterVO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\DataTransferObjects\Orders\OrderApplyDiscountDTO;
use App\Models\Inventory;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\productKitDetail;
use App\Models\Products;
use App\Models\Stock;
use App\Repositories\Order\InventoryExtractionCenter\contracts\InventoryExtractionCenterInterface;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\Cast\String_;
use PhpParser\Node\Stmt\Echo_;

class EloquentOrderRepository implements Contracts\EloquentOrderRepositoryInterface
{

    /**
     * @var InventoryExtractionCenterInterface
     */
    private $InventoryExtractionCenterInterface;

    public function __construct(InventoryExtractionCenterInterface $InventoryExtractionCenterInterface)
    {
        $this->InventoryExtractionCenterInterface = $InventoryExtractionCenterInterface;
    }

    /**
     * @param ListProductGetOrderDTO[] $listProductGetOrderDTO
     * @param int $orderID
     * @return array
     */
    public function toDiscount(array $listProductGetOrderDTO, int $orderID ,bool $update = false ): array
    {

        $total_price_neto = 0;
        $total_order_number = 0;
        $total_amount_to_discount=0;
        $sedeId = Orders::where("id","=",$orderID)->select('stores_id')->first()->stores_id;

        foreach ($listProductGetOrderDTO as $OrdersDetail) {

            $sub_total_price = 0;
            $quantityProductOrder = doubleval($OrdersDetail['quantity']);
            $currentMissingQuantity = $quantityProductOrder;
            $currentQuantity = 0;
            $currentAmountForSaveOrder = $currentMissingQuantity;
            $index = 0;
            $price_products = 0;
            $ordersDetailSaveId = OrdersDetail::create([])->id;

            while ($currentMissingQuantity > 0) {

                $stocks = Stock::where("products_id", "=", $OrdersDetail['productId'])
                    ->where("stores_id","=",$sedeId)
                    ->where("stock_in", "!=", "0")
                    ->with(['inventory'=> function ($query) {
                        $query->where('is_sold', '=', 0);
                    }])
                    ->orderBy('created_at', 'asc')
                    ->first();

                if ($stocks != null) {

                    $Available = $stocks->stock_in;
                    $NotAvailable = $stocks->stock_out;

                    $IsEnough = $Available >= $quantityProductOrder - $currentQuantity;
                    $IsNotEnough = $Available < $quantityProductOrder - $currentQuantity;

                    $price_products = $stocks->price_products;

                    if ($IsEnough) {

                        //Discount logic
                        if($OrdersDetail['discount']>0){

                         $discount_aux=0;
                         $quantity = $quantityProductOrder - $currentQuantity;
                         $price =  $stocks->price_products * $quantity;
                         $discount_aux =  (($OrdersDetail['discount'])* $price)/100;
                         $total_amount_to_discount += $discount_aux;

                        }

                        $sub_total_priceAux = $quantityProductOrder - $currentQuantity;
                        $sub_total_price += $stocks->price_products * $sub_total_priceAux;


                        $inventoryList = $stocks->inventory->pluck('id')->toArray();
                        $this->InventoryExtractionCenterInterface->extractDetails(

                            new InventoryExtractionCenterVO(
                                $sedeId,
                                $orderID,
                                $ordersDetailSaveId,
                                $stocks->id,
                                $quantityProductOrder - $currentQuantity,
                                false,
                                true,
                                array_slice($inventoryList, 0, intval($quantityProductOrder - $currentQuantity)),

                            )
                        );
//                        $RemainingAmount = $Available - $quantityProductOrder + $currentQuantity;
//
//                        Stock::where('id', '=', $stocks->id)
//                            ->update(
//                                ['stock_in' => $RemainingAmount,
//                                    'stock_out' => $NotAvailable + $quantityProductOrder - $currentQuantity]
//                        );
//
//                        //Update Inventory
//                        $quantityAux = $quantityProductOrder - $currentQuantity;
//                        foreach ($stocks->inventory as $inventory) {
//                            if ($quantityAux != 0) {
//                                Inventory::where('id', $inventory->id)
//                                    ->update(['is_sold' => "1", "order_id" => $orderID]);
//                                $quantityAux = $quantityAux - 1;
//                            }
//                        }

                        $currentMissingQuantity = 0;
                        $currentQuantity += $quantityProductOrder;

                    }


                    if ($IsNotEnough) {

                        $MissingAmount = $quantityProductOrder - $Available;

                        //Discount logic
                        if( $OrdersDetail['discount'] > 0 ){

                             $discount_aux =0;
                             $quantity =  $Available;
                             $price =  $stocks->price_products * $quantity;
                             $discount_aux =  (($OrdersDetail['discount'])* $price)/100;
                             $total_amount_to_discount += $discount_aux;

                        }


                        $sub_total_priceAux = $Available;
                        $sub_total_price += $stocks->price_products * $sub_total_priceAux;

                        $inventoryList = $stocks->inventory->pluck('id')->toArray();
                        $this->InventoryExtractionCenterInterface->extractDetails(
                            new InventoryExtractionCenterVO(
                                $sedeId,
                                $orderID,
                                $ordersDetailSaveId,
                                $stocks->id,
                                count($inventoryList),
                                false,
                                true,
                                array_slice($inventoryList, 0, count($inventoryList)),
                            )
                        );

//                        Stock::where('id', $stocks->id)
//                            ->update(['stock_in' => 0,
//                                'stock_out' => $NotAvailable + $Available]);
//
//                        // Update Inventory
//                        foreach ($stocks->inventory as $inventory) {
//                            Inventory::where('id', $inventory->id)
//                                ->update(['is_sold' => "1", "order_id" => $orderID]);
//                        }

                        $currentMissingQuantity = $MissingAmount;
                        $currentQuantity += $quantityProductOrder - $MissingAmount;

                    }

                }

                $currentAmountForSaveOrder = $currentMissingQuantity;


                if ($stocks == null) {
                    $currentAmountForSaveOrder = $currentMissingQuantity;
                    $currentMissingQuantity = 0;
                }

                $index = $index + 1;

            }


            $product = Products::where("id", "=", $OrdersDetail['productId'])->first();

            $finalQuantity = $quantityProductOrder - $currentAmountForSaveOrder;


                if($update == false){

                     OrdersDetail::where('id', $ordersDetailSaveId)
                        ->update(
                            [
                                'orders_id' => $orderID,
                                'products_id' => $OrdersDetail['productId'],
                                'products_name' => $product->name,
                                'products_price' => $price_products,
                                'quantity' => $finalQuantity??0,
                                'sub_total' => $sub_total_price,
                            ]
                        );

                    $ordersDetailSave = OrdersDetail::where('id',$ordersDetailSaveId )->first();


                }else{

                    $orderDetailAux = OrdersDetail::find($OrdersDetail['orderDetailId']);
                    if($orderDetailAux){
                        $ordersDetailSave = $ordersDetailSave
                            ->update(
                                [
                                    'quantity' => $orderDetailAux->quantity + $finalQuantity??0,
                                    'sub_total' => $orderDetailAux->sub_total + $sub_total_price,
                                ]
                            );
                    }
                }


            if($update == false){

                $total_order_number += $finalQuantity??0;
                $total_price_neto += $ordersDetailSave->sub_total;

            }else{

                $total_order_number += $finalQuantity??0;
                $total_price_neto += $sub_total_price;

            }

        }

        return [ "total_order" => $total_order_number??0, "total_price_neto" => $total_price_neto??0, "total_amount_to_discount"=> $total_amount_to_discount ];


    }

    // private function totalAmountToDiscount(array $listProductGetOrderDTO  ){
    //     if($OrdersDetail['discount']>0){
    //         $quantity = $OrdersDetail['quantity'];
    //         $total_amount_to_discount += ((($quantity-$currentQuantity)*$stocks->price_products)*($OrdersDetail['discount']*$quantity)) /100 ;
    //       }
    // }

    /**
     * @param array $toDiscountData
     * @param int $orderID
     * @param int $total_order
     * @param bool $update
     * @return mixed
     */

    public function defineState(array $toDiscountData, int $orderID, int $total_order,bool $update = false,bool $is_tax = false )
    {

        //todo actualizar cuando $update sea true
            if ($toDiscountData['total_order'] < 1) {
                $this->updateStatusLocal($orderID, Orders::PENDIENTE);
            }

            //TODO APLICAR DESCUENTOS
            if ($toDiscountData['total_order'] > 0 && $toDiscountData['total_order'] < $total_order) {
                $orderApplyDiscountDTO = new OrderApplyDiscountDTO();
                $orderApplyDiscountDTO->setStatus(Orders::INCOMPLETO);
                $orderApplyDiscountDTO->setTotal($toDiscountData['total_price_neto']);
                $orderApplyDiscountDTO->setTax(Orders::getIva());
//                $orderApplyDiscountDTO->setDiscount($discount);
                $orderApplyDiscountDTO->setGrandTotal($toDiscountData['total_price_neto'] - $toDiscountData['total_amount_to_discount'] );

                $this->updateApplyDiscount(
                    $orderID,
                    $orderApplyDiscountDTO,
                    $is_tax
                );
            }

            if ($toDiscountData['total_order'] == $total_order) {
                $orderApplyDiscountDTO = new OrderApplyDiscountDTO();
                $orderApplyDiscountDTO->setStatus(Orders::EN_VALIDACION);
                $orderApplyDiscountDTO->setTotal($toDiscountData['total_price_neto']);
                $orderApplyDiscountDTO->setTax(Orders::getIva());
//                $orderApplyDiscountDTO->setDiscount($discount);
                $orderApplyDiscountDTO->setGrandTotal($toDiscountData['total_price_neto'] - $toDiscountData['total_amount_to_discount'] );

                $this->updateApplyDiscount(

                    $orderID,
                    $orderApplyDiscountDTO,
                    $is_tax

                );
            }
    }

    /**
     * @param int $orderID
     * @param OrderApplyDiscountDTO $applyDiscountDTO
     * @param bool $iva
     * @param int $discount
     * @return bool
     */
    private function updateApplyDiscount(int $orderID, OrderApplyDiscountDTO $applyDiscountDTO, $iva = false): bool
    {

        if($applyDiscountDTO->getTotal() == 0){
            $discount = (( $applyDiscountDTO->getTotal() - $applyDiscountDTO->getGrandTotal() ) / 1)*100;
        }else{
            $discount = (( $applyDiscountDTO->getTotal() - $applyDiscountDTO->getGrandTotal() ) / $applyDiscountDTO->getTotal())*100;
        }

        if($iva == false || $applyDiscountDTO->getStatus() == Orders::INCOMPLETO  ){

//            $descuento = $applyDiscountDTO->getGrandTotal() * ($discount / 100);


            return (bool)Orders::where('id', $orderID)->update([
                'status' => $applyDiscountDTO->getStatus(),
                'total' => $applyDiscountDTO->getTotal(),
                'tax' => $applyDiscountDTO->getTax(),
                'discount' => $discount,
                'grand_total' => $applyDiscountDTO->getGrandTotal(),
            ]);

        }else{


            return (bool)Orders::where('id', $orderID)->update([

                'status' => $applyDiscountDTO->getStatus(),
                'total' => $applyDiscountDTO->getTotal(),
                'tax' => $applyDiscountDTO->getTax(),
                'discount' => $discount,
                'grand_total' => $applyDiscountDTO->getGrandTotal() * Orders::GetIvaForCalculate(),

            ]);

        }


    }

    /**
     * @param int $orderID
     * @param string $status
     * @return bool
     */
    private function updateStatusLocal(int $orderID, string $status): bool
    {
        return (bool)Orders::where('id', $orderID)->update(['status' => $status]);
    }

    /**
     * @param int $orderID
     * @param string $status
     * @return bool
     */
    public function updateStatus(int $orderID, string $status): bool
    {
        if($status == Orders::ENTREGADO ){
            return (bool)Orders::where('id', $orderID)->update([
                'status' => $status,
                'delivery_date_time' => now()
            ]);
        }else{
            return (bool)Orders::where('id', $orderID)->update([
                'status' => $status,
            ]);
        }
    }

    /**
     * @param int $orderId
     * @return Orders|null
     */
    public function findById(int $orderId): ?Orders
    {
        return Orders::where('id', $orderId)->first();
    }


    /**
     * @param GetOrderRequestDTO $orderRequestDTO
     *
     */
    public function decodeInicialOrderFormat(GetOrderRequestDTO $orderRequestDTO){


            $finalListOrderRequestDTO = [];

            // dd ( $orderRequestDTO->getListProduct() );
            foreach ( $orderRequestDTO->getListProduct() as &$valorG ) {


                if( $valorG->GetIsCombo() ){

                   $discount = $valorG->GetKit()['discount'];

                  //Este for esta para poder agregar varios combos
                   for ($i=0; $i < $valorG->getQuantity() ;$i++) {

                    foreach ( $valorG->GetKit()['kit'] as &$valor ) {

                         $listGetOrder = new ListProductGetOrderDTO();
                         $listGetOrder->setProductId($valor['products_id']);
                         $listGetOrder->setQuantity($valor['quantity']);
                         $listGetOrder->SetIsCombo(false);
                         $listGetOrder->SetDiscount($discount);

                         array_push($finalListOrderRequestDTO, $listGetOrder);

                    }

                   }

                }else{

                    $discount = $valorG->GetDiscount();
                    $listGetOrder = new ListProductGetOrderDTO();
                    $listGetOrder->setProductId($valorG->GetProductId());
                    $listGetOrder->setQuantity($valorG->GetQuantity());
                    $listGetOrder->SetIsCombo(false);
                    $listGetOrder->SetDiscount( $discount );

                    array_push($finalListOrderRequestDTO, $listGetOrder);

                }


            }


          return $this->simplifyListOrder( $finalListOrderRequestDTO );

    }


    private function simplifyListOrder($array){


        $ListAux = [];
        $finalList = [];
        foreach ( $array as &$data ) {
            $Key = $data->getProductId() ." ". $data->GetDiscount();
            if( $ListAux[ $Key ] != null && $ListAux[$Key]->GetDiscount() ==  $data->GetDiscount() ){
                    $listGetOrder = new ListProductGetOrderDTO();
                    $listGetOrder->setProductId($data->GetProductId());
                    $listGetOrder->setQuantity( $ListAux[$Key]->GetQuantity() + $data->GetQuantity()  );
                    $listGetOrder->SetIsCombo(false);
                    $listGetOrder->SetDiscount( $data->GetDiscount() );
                    $ListAux[ $Key ] = $listGetOrder;
            }else{
                $ListAux[ $Key ] = $data;
            }
        }

        foreach ( $ListAux as &$data ) {
            array_push($finalList,$data);
        }

        return $finalList;

    }
}
