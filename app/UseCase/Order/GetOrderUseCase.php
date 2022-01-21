<?php

namespace App\UseCase\Order;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\InventoryExtractionCenterVO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\DataTransferObjects\Orders\OrderApplyDiscountDTO;
use App\Models\Inventory;
use App\Models\Orders;
use App\Models\OrdersDetail;
use App\Models\PendingOrderDetails;
use App\Models\Products;
use App\Models\ShippingAgents;
use App\Models\Stock;
use App\Repositories\Asesor\CalculateCommission\Contracts\CalculateCommissionInterface;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\Repositories\Order\InventoryExtractionCenter\contracts\InventoryExtractionCenterInterface;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as Response;

class GetOrderUseCase implements GetOrderUseCaseInterface
{

    /**
     * @var InventoryExtractionCenterInterface
     */
    private $InventoryExtractionCenterInterface;

    /**
     * @var EloquentOrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var  CalculateCommissionInterface
     */
    private $CalculateCommissionRepository;

    /**
     * @param EloquentOrderRepositoryInterface $orderRepository
     */
    public function __construct(
        EloquentOrderRepositoryInterface $orderRepository,
        CalculateCommissionInterface $CalculateCommissionRepository,
        InventoryExtractionCenterInterface $InventoryExtractionCenterInterface
    )
    {
        $this->orderRepository = $orderRepository;
        $this->CalculateCommissionRepository = $CalculateCommissionRepository;
        $this->InventoryExtractionCenterInterface = $InventoryExtractionCenterInterface;

    }


    /**
     * @param GetOrderRequestDTO $OrderDTO
     * @return array
     */
    public function save(GetOrderRequestDTO $OrderDTO): array
    {


        try {


            if(!$OrderDTO->getOrderNumber()){
                $OrderDTO->setOrderNumber(Orders::ReserveOrderNumber());
            }

            DB::beginTransaction();
            $order = Orders::create(
                [
                    'user_id' => $OrderDTO->getUserId(),
                    'stores_id' => $OrderDTO->getStoresId(),
                    'customers_id' => $OrderDTO->getClientId(),
                    'shipping_agent_id' => $OrderDTO->getShippingAgentId(),
                    'order_number' => $OrderDTO->getOrderNumber(),
                    'payment_methods' => $OrderDTO->getPaymentMethods(),
                    'is_reserved' => $OrderDTO->getIsReserved(),
                    'guide_number' => $OrderDTO->getGuideNumber(),
                    'adress' => $OrderDTO->getAddress(),
                    'municipality_id' => $OrderDTO->getMunicipalityId(),
                    'department_id' => $OrderDTO->getDepartmentId(),
                    'who_receives' => $OrderDTO->getWhoReceives(),
                    'Description' => $OrderDTO->getDescription(),
//                    'discount' => $OrderDTO->getDiscount(),
                    'is_tax' => $OrderDTO->getIsTax() == 1 ? true : false,
                    'receives_identification_number' => $OrderDTO->getReceives_identification_number(),
                    'commission' => $OrderDTO->getCommission(),
                    'shipping_cost' => $OrderDTO->getShippingCost(),
                    'payment_gateway_agent_id' => $OrderDTO->getPaymentGatewayAgentId(),

                ]
            );

            $Description = '';
            $listProducts = $OrderDTO->getListProduct();

            $orderDetails = [];
            $total_order = 0;
            foreach ($listProducts as $i => $list) {
                $total_order += $list->getQuantity();
                array_push($orderDetails, [
                    'productId' => $list->getProductId(),
                    'quantity' => $list->getQuantity(),
                    'isCombo' => $list->GetIsCombo(),
                    'kit' => $list->Getkit(),
                    'discount' => $list->GetDiscount()
                ]);

                if($i > 0){
                    $Description .= " + ".$list->getQuantity()." ".Products::where('id',$list->getProductId())->first()->name;
                }else{
                    $Description = $list->getQuantity()." ".Products::where('id',$list->getProductId())->first()->name;
                }

            }

            Orders::where('id',$order->id)->update(['Description'=>$Description]);


            PendingOrderDetails::create(
                [
                    'orders_id' => $order->id,
                    'order_detail' => json_encode($orderDetails)
                ]
            );

            $listProducts = $this->orderRepository->decodeInicialOrderFormat($OrderDTO);


            $orderDetails = [];
            $total_order = 0;
            foreach ($listProducts as $list) {
                $total_order += $list->getQuantity();
                array_push($orderDetails, [
                    'productId' => $list->getProductId(),
                    'quantity' => $list->getQuantity(),
                    'isCombo' => $list->GetIsCombo(),
                    'kit' => $list->Getkit(),
                    'discount' => $list->GetDiscount()
                ]);
            }


            $toDiscountData = $this->orderRepository->toDiscount($orderDetails, $order->id);

            $this->orderRepository->defineState($toDiscountData, $order->id, $total_order, false, $OrderDTO->getIsTax());

            DB::commit();


            $this->CalculateCommissionRepository->calculateCommissionByOrderId( $order->id );

            return ['success' => true];


        } catch (\Exception $exception) {

            return ['success' => false, 'data' =>  $exception->getMessage()];

        }
    }

    /**
     * @param int $orderId
     *
     */
    public function updateCancel(int $orderId)
    {
        DB::beginTransaction();

        $inventory = Inventory::where('order_id', $orderId)
            ->with('stock')
            ->get();



        $List = [];
        foreach ($inventory as $Detail) {
            $listAux = $List[$Detail->stock->id];

            if ($listAux != null) {
                array_push($listAux, $Detail);
            } else {
                $listAux = [$Detail];
            }
            $List[$Detail->stock->id] = $listAux;
        }

//        dd($List);

        foreach ($List as $Detail) {
            $stock = $Detail[0]->stock;
            $quantity = sizeof($Detail);

//            $inventoryList = $Detail->pluck('id')->toArray();
            $inventoryList = [];
            foreach ($Detail as $invent) {
                array_push($inventoryList,$invent->id);
            }

            $this->InventoryExtractionCenterInterface->extractDetails(
                new InventoryExtractionCenterVO(
                    $stock->stores_id,
                    $orderId,
                    null,
                    $stock->id,
                    $quantity,
                    true,
                    false,
                    $inventoryList,
                )
            );

//            Stock::where('id', $stock->id)
//                ->update(['stock_in' => $stock->stock_in + $quantity,
//                    'stock_out' => $stock->stock_out - $quantity]);
//            foreach ($Detail as $invent) {
//                Inventory::where(
//                    'id',
//                    $invent->id
//                )->update(['is_sold' => "0", "order_id" => null]);
//            }
        }

        $orderDetailsId = OrdersDetail::where("orders_id", "=", $orderId)->pluck('id');
        OrdersDetail::whereIn('id', $orderDetailsId)->update([
            'quantity' => 0,
            'sub_total' => 0,
        ]);


        Orders::where('id', $orderId)->update([
            'total' => 0,
            'grand_total' => 0,
            'discount' => 0

        ]);

        DB::commit();

        return $this->orderRepository->updateStatus($orderId, Orders::CANCELADA);

    }

    /**
     * @param int $orderId
     */

    public function toCompletedOrder(int $orderId)
    {

        DB::beginTransaction();

        $Order = Orders::where("id", "=", $orderId)->select('grand_total', 'is_tax')->first();


        $orderDetail = OrdersDetail::where("orders_id", "=", $orderId)->get();

        $pendingOrderDetails = PendingOrderDetails::where("orders_id", "=", $orderId)->first();

        $pendinOrderDetail = json_decode($pendingOrderDetails->order_detail);

        $listOrderSave = [];

        $total_order = 0;
        $totalOrderDetail = 0;
        $totalPriceNeto = 0;
        $iterator = 0;

        $getOrder = new GetOrderRequestDTO();

        $listProducts = [];
        foreach ($pendinOrderDetail as &$detail) {
            // dd($detail);
            if ($detail->isCombo) {

                $listKit = [];
                foreach ($detail->kit->kit as &$item) {
                    array_push($listKit, ["quantity" => $item->quantity, "products_id" => $item->products_id,]);
                }

                $listGetOrder = new ListProductGetOrderDTO();
                $listGetOrder->setProductId($detail->productId);
                $listGetOrder->setQuantity($detail->quantity);
                $listGetOrder->SetIsCombo($detail->isCombo);
                $listGetOrder->Setkit(["kit" => $listKit, "discount" => $detail->kit->discount]);
                $listGetOrder->SetDiscount($detail->discount);
                array_push($listProducts, $listGetOrder);

            } else {
                $listGetOrder = new ListProductGetOrderDTO();
                $listGetOrder->setProductId($detail->productId);
                $listGetOrder->setQuantity($detail->quantity);
                $listGetOrder->SetIsCombo(false);
                $listGetOrder->Setkit(null);
                $listGetOrder->SetDiscount($detail->discount);
                array_push($listProducts, $listGetOrder);
            }


        }


        $getOrder->setListProduct($listProducts);

        $decodeInicialOrderFormat = $this->orderRepository->decodeInicialOrderFormat($getOrder);

        $orderDetailsFinal = [];

        foreach ($decodeInicialOrderFormat as $list) {
            // $total_order += $list->getQuantity();
            array_push($orderDetailsFinal, [
                'productId' => $list->getProductId(),
                'quantity' => $list->getQuantity(),
                'isCombo' => $list->GetIsCombo(),
                'kit' => $list->Getkit(),
                'discount' => $list->GetDiscount()
            ]);
        }

        // dd($orderDetailsFinal);
        foreach ($orderDetailsFinal as $detail) {

            $total_order += $detail['quantity'];
            $totalOrderDetail += $orderDetail[$iterator]->quantity;
            $totalPriceNeto += $orderDetail[$iterator]->sub_total;

            $pendinDetailQuantity = $detail['quantity'];
            $orderDetailQuantity = $orderDetail[$iterator]->quantity;
            $missingAmount = $pendinDetailQuantity - $orderDetailQuantity;

            if ($missingAmount > 0) {
                array_push($listOrderSave, [
                    "orderDetailId" => $orderDetail[$iterator]->id,
                    "productId" => $detail['productId'],
                    "quantity" => $missingAmount,
                    'isCombo' => false,
                    'kit' => null,
                    'discount' => $detail['discount']
                ]);
            }
            $iterator++;
        }

        $toDiscountData = $this->orderRepository->toDiscount($listOrderSave, $orderId, true);

        $total_amount_to_discount = ((double)$totalPriceNeto - (double)$Order->grand_total) + (double)$toDiscountData['total_amount_to_discount'];

        $this->orderRepository->defineState(
            [
                "total_order" => $totalOrderDetail + $toDiscountData['total_order'],
                "total_price_neto" => (double)$totalPriceNeto + (double)$toDiscountData['total_price_neto'],
                "total_amount_to_discount" => $total_amount_to_discount],
            $orderId, $total_order, true, $Order->is_tax);

        DB::commit();
        $status = Orders::where("id", $orderId)->select('status')->first()->status;

        return ["message" => "Ahora la orden se encuentra en el estado: $status", "status" => $status, "data" => $toDiscountData];
    }


    /**
     * @param int $orderId
     */

    public function nextStatus(int $orderId)
    {

        if ($order = Orders::where('id', $orderId)->first()) {

            $status = $order->status;
            $statusForSave = "";


            switch ($status) {

                case Orders::EN_VALIDACION:

                    $statusForSave = Orders::ALISTAMIENTO;
                    break;

                case Orders::ALISTAMIENTO:
                    // dd($order->guide_number);
                    if ($order->guide_number != null) {
                        $statusForSave = Orders::GUIA_GENERADA;
                    }
//                       else if(ShippingAgents::where('id',$order->shipping_agent__id)->first()->name == ShippingAgents::ENTREGA_FISICA){
//                        $statusForSave = Orders::ENTREGADO;
//                    }
                    else{
                        return ["message" => "Esta orden no tiene numero de guia", "estado" => $statusForSave];
                    }

                    break;

                case Orders::GUIA_GENERADA:
                    $statusForSave = Orders::EN_REPARTO;
                    break;

                case Orders::EN_REPARTO:
                    $statusForSave = Orders::ENTREGADO;
                    break;

            }

            if ($statusForSave != "") {
                $this->orderRepository->updateStatus($orderId, $statusForSave);
                return ["message" => "Ahora la orden esta en el estado $statusForSave", "estado" => $statusForSave];
            }

            return ["message" => "No puedes usar esta funcion en el estado de " . $status, "estado" => $statusForSave];


        } else {
            return "la orden no existe";
        }


//        return $this->orderRepository->updateStatus($orderId, Orders::INCOMPLETO);
    }
}
