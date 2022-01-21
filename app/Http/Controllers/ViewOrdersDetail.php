<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\Models\Inventory;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\PendingOrderDetails;
use App\Models\productKitDetail;
use App\Models\Products;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\Repositories\PaymentReports\PaymentReportsRepository;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;

class ViewOrdersDetail extends Controller
{

    /**
     * @var EloquentOrderRepositoryInterface
     */

    private $EloquentOrderRepositoryInterface;

    public function __construct(EloquentOrderRepositoryInterface $EloquentOrderRepositoryInterface)
    {
        $this->EloquentOrderRepositoryInterface = $EloquentOrderRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admin_path = config('crudbooster.ADMIN_PATH') ?: 'admin';
        if (CRUDBooster::myPrivilegeId() == null) {
            $url = url($admin_path . '/login');
            return redirect($url)->with('message', trans('crudbooster.not_logged_in'));
        }


     $orderId = Request()['id'];

     if(!$orderId){
         $url = url($admin_path . '/orders');
         return redirect($url);
     }

     if(!Orders::where('id',$orderId)->first() ){
         $url = url($admin_path . '/orders');
         return redirect($url);
     }

     $pendingOrderDetails = json_decode(PendingOrderDetails::where("orders_id", "=", $orderId)->first()->order_detail);
     $orderDetail = OrdersDetail::where("orders_id", "=", $orderId)->get();
     $dataOrder = Orders::where('id',$orderId)->select('status','created_at','order_number','status')->first();

     $finalPendingOrderDetails = [];
     $finalOrderDetailDetails = [];


     $finalPendingOrderDetails =  $this->MakeFinalPendingOrderDetails($pendingOrderDetails);


     $OrderDTO = $this->makeToOrder($pendingOrderDetails);

     $listProducts = $this->EloquentOrderRepositoryInterface->decodeInicialOrderFormat($OrderDTO);

     $finalOrderDetailDetails = $this->MakeFinalOrderDetailDetails($listProducts, $orderDetail,$orderId);

     $ordeNumber = str_split($dataOrder->order_number);

//     dd($ordeNumber);

     return view('/Orders/ViewOrderDetail',compact('finalPendingOrderDetails','dataOrder','finalOrderDetailDetails','ordeNumber'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        $admin_path = config('crudbooster.ADMIN_PATH') ?: 'admin';
        if (CRUDBooster::myPrivilegeId() == null) {
            $url = url($admin_path . '/login');
            return redirect($url)->with('message', trans('crudbooster.not_logged_in'));
        }


        $orderId = Request()['id'];


        if(!$orderId){
            $url = url($admin_path . '/orders');
            return redirect($url);
        }

        if(!Orders::where('id',$orderId)->first() ){
            $url = url($admin_path . '/orders');
            return redirect($url);
        }

        $pendingOrderDetails = json_decode(PendingOrderDetails::where("orders_id", "=", $orderId)->first()->order_detail);
        $orderDetail = OrdersDetail::where("orders_id", "=", $orderId)->get();
        $dataOrder = Orders::where('id',$orderId)->select('status','created_at','order_number','status')->first();

        $finalPendingOrderDetails = [];
        $finalOrderDetailDetails = [];


        $finalPendingOrderDetails =  $this->MakeFinalPendingOrderDetails($pendingOrderDetails);


        $OrderDTO = $this->makeToOrder($pendingOrderDetails);

        $listProducts = $this->EloquentOrderRepositoryInterface->decodeInicialOrderFormat($OrderDTO);

        $finalOrderDetailDetails = $this->MakeFinalOrderDetailDetails($listProducts, $orderDetail,$orderId);

        $ordeNumber = str_split($dataOrder->order_number);

        return view('/Orders/EtitOrderDetail',compact('finalPendingOrderDetails','dataOrder','finalOrderDetailDetails','ordeNumber'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function MakeFinalPendingOrderDetails($pendingOrderDetails){

        $finalPendingOrderDetails = [];

        foreach ($pendingOrderDetails as $detail) {

            $product = Products::where('id',$detail->productId)->first();

            $descuentoPrice = $product->commercial_sale_price;

            if($detail->discount > 0){
                $descuentoPrice = ($detail->discount * $product->commercial_sale_price) / 100;
                $descuentoPrice = $product->commercial_sale_price - $descuentoPrice;
            }

//            dd($descuentoPrice);

            array_push( $finalPendingOrderDetails, [

                "Id" => $detail->productId,
                "Nombre"=>$product->name,
                "Imagen"=>$product->picture,
                "Precio_de_venta"=>$descuentoPrice,
                "Precio"=>$product->commercial_sale_price,
                "Descuento"=>$detail->discount,
                "Cantidad"=>$detail->quantity,
                "Combo"=>$detail->isCombo,

            ]);

        }

        return $finalPendingOrderDetails;

    }

    private function makeToOrder($list_product){


            $listProductsfinal = [];
            foreach ( $list_product as $productItem ){

                $product = Products::where('id',$productItem->productId)
                    ->select('type','discount_kit','id')
                    ->first();

                if ( $product ){

                    $listGetOrder = new ListProductGetOrderDTO();
                    $listGetOrder->setProductId($productItem->productId);
                    $listGetOrder->setQuantity($productItem->quantity);

                    if( $product->type == Products::KIT){

                        $listGetOrder->SetIsCombo(true);
                        $listGetOrder->Setkit([
                            "discount"=> $productItem->discount,
                            "kit" => productKitDetail::where( 'products_kit_id', $product->id )
                                ->select('products_id','quantity')
                                ->get()
                        ]);
                        $listGetOrder->SetDiscount(0);

                    }

                    if( $product->type == Products::PRODUCT ){
                        $listGetOrder->SetIsCombo(false);
                        $listGetOrder->SetDiscount($productItem->discount);
                    }

                    array_push($listProductsfinal, $listGetOrder);
                }

            }

            $getOrder = new GetOrderRequestDTO();
            $getOrder->setListProduct($listProductsfinal);


            return $getOrder;

    }

    private function MakeFinalOrderDetailDetails( $listProducts, $orderDetail,$order_id){



        $HistoryInventory[""] = [];
        $finalList = [];


        foreach ($orderDetail as $i => $element ){



            $inventory = [];
            $product = Products::where('id',$element->products_id)->first();

            $descuentoPrice = $element->sub_total;

            if($listProducts[$i]->GetDiscount() > 0){
                $descuentoPrice = ( $listProducts[$i]->GetDiscount() * $element->sub_total ) / 100;
                $descuentoPrice = $element->sub_total - $descuentoPrice;
            }

            // ------ Logic Inventory
            if(!$HistoryInventory[$element->products_id]){

                $inventoryAux = Inventory::where('order_id', $order_id)
                    ->join('stocks', 'inventory.stocks_id', '=', 'stocks.id')
                    ->select('stocks.products_id as products_id','inventory.imei','inventory.reference')
                    ->where('stocks.products_id',$element->products_id)
                    ->get();
                $FinalInventoryAux = [];
                $TempInventoryAux = [];


               foreach ($inventoryAux as $i2 => $item){
                   array_push($TempInventoryAux, [
                       "imei"=>$item->imei,
                       "reference"=>$item->reference
                   ]);
               }

                for($i2=0;$i2<$element->quantity;$i2++) {
                    array_push($FinalInventoryAux,$TempInventoryAux[0]);
                    array_shift($TempInventoryAux);
                }

                $inventory = $FinalInventoryAux;
                $HistoryInventory[$element->products_id] .= json_encode($TempInventoryAux);


            }else{

                $inventoryAux = json_decode($HistoryInventory[$element->products_id]);

                $FinalInventoryAux = [];
                $TempInventoryAux = [];

                foreach ($inventoryAux as $i3 => $item2){
                    array_push($TempInventoryAux, [
                        "imei"=>$item2->imei,
                        "reference"=>$item2->reference
                    ]);
                }

                for($i4=0;$i4<$element->quantity;$i4++) {
                    array_push($FinalInventoryAux,$TempInventoryAux[0]);
                    array_shift($TempInventoryAux);
                }

                $inventory = $FinalInventoryAux;
                $HistoryInventory[$element->products_id] = json_encode($TempInventoryAux);

            }
            // ------ Fin Logic Inventory

            array_push($finalList,
                [
                     "Id" => $element->products_id,
                     "Nombre"=>$product->name,
                     "Imagen"=>$product->picture,
                     "Precio_de_venta"=>$descuentoPrice,
                     "Precio"=>$product->commercial_sale_price,
                     "Descuento"=>$listProducts[$i]->GetDiscount(),
                     "Combo"=>$listProducts[$i]->GetIsCombo(),
                     "cantidad_tomada"=>$element->quantity,
                     "Cantidad_neta"=>$listProducts[$i]->getQuantity(),
                     "Inventory" => $inventory

                 ]
            );
        }


        return $finalList;

    }

}
