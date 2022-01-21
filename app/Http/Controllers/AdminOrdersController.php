<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Orders\GetOrderRequestDTO;
use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
use App\Models\CmsUser;
use App\Models\OnelinePaymentStatus;
use App\Models\Orders;
use App\Models\PaymentMethods;
use App\Models\productKitDetail;
use App\Models\Products;
use App\Repositories\Asesor\CalculateCommission\CalculateCommissionRepository;
use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
use App\Repositories\PaymentReports\Contracts\PaymentReportsInterface;
use App\Repositories\stock\StockRepo;
use App\Repositories\stock\updateStockMongo\Contracts\UpdateStockMongoInterface;
use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
use App\UseCase\Order\GetOrderUseCase;
use Session;
use Request;
use DB;
use CRUDBooster;
use DateTime;

class AdminOrdersController extends \crocodicstudio\crudbooster\controllers\CBController
{

    /**
     * @param UpdateStockMongoInterface $orderRepository
     */
    private $updateStockMongo;

    /**
     * @var EloquentOrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var GetOrderUseCaseInterface
     */
    private $GetOrderUseCase;

    /**
     * @var PaymentReportsInterface
     */
    private $PaymentReportsInterface;



    public function __construct(
        EloquentOrderRepositoryInterface $orderRepository,
        ListProductGetOrderDTO           $ListProductGetOrderDTO,
        GetOrderRequestDTO               $GetOrderRequestDTO,
        GetOrderUseCaseInterface         $GetOrderUseCase,
        UpdateStockMongoInterface $updateStockMongo,
        PaymentReportsInterface $PaymentReportsInterface
    )
    {
        $this->orderRepository = $orderRepository;
        $this->ListProductGetOrderDTO = $ListProductGetOrderDTO;
        $this->ListProductGetOrderDTO = $ListProductGetOrderDTO;
        $this->GetOrderRequestDTO = $GetOrderRequestDTO;
        $this->GetOrderUseCase = $GetOrderUseCase;
        $this->updateStockMongo = $updateStockMongo;
        $this->PaymentReportsInterface = $PaymentReportsInterface;

    }

    public function cbInit()
    {

        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field = "id";
        $this->limit = "20";
        $this->orderby = "id,desc";
        $this->global_privilege = false;
        $this->button_table_action = true;
        $this->button_bulk_action = true;
        $this->button_action_style = "button_icon";
        $this->button_add = true;
        $this->button_edit = true;
        $this->button_delete = false;
        $this->button_detail = true;
        $this->button_show = true;
        $this->button_filter = true;
        $this->button_import = false;
        $this->button_export = true;
        $this->table = "orders";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];

//        $this->col[] = ["label" => "Sede", "name" => "stores_id", 'type' => 'text', "join" => 'stores,name'];
//            if( CRUDBooster::isSuperadmin() ){           }
        $this->col[] = ["label" => "Numero de orden", "name" => "order_number"];
        $this->col[] = ["label" => "Asesor", "name" => "user_id", "join" => "cms_users,name"];

        $this->col[] = ["label" => "Cliente", "name" => "customers_id", "join" => "customers,name"];


        //PaymentMethods logic
        $PaymentMethods = PaymentMethods::get();
        $map2[""] = "";
        foreach ($PaymentMethods as $index => $item ){
            $map2[$item->identifier_code] .= $item->name;
        }
        $val = json_encode( str_replace(['{','}','"',":",","],['llavesAbierta','llavesCerrada',"comillas","dosPuntos","coma"],json_encode($map2)) );
        $this->col[] = ["label" => "Metodo de pago", "name" => "payment_methods" ,
            "callback_php" => '
                $dataJson = '.$val.';
                if($dataJson != nul){
                $dataJson = str_replace(["llavesAbierta","llavesCerrada","comillas","dosPuntos","coma"],["{","}","\"",":",","],$dataJson) ;
                $dataJson = json_decode($dataJson);
                $map = null;
                foreach($dataJson as $key => $val ){
                  $map[$key] .= $val;
                }
                $value = $row->payment_methods;
                if($map[$value] != null){
                   $value = $map[$value];
                }
                $row->payment_methods=$value;
            }'];
        $this->col[] = ["label" => "Agente de envio", "name" => "shipping_agent_id", "join" => "shipping_agents,name"];
        $this->col[] = ["label" => "Estado Envio", "name" => "shipping_agent_status"];
        $this->col[] = ["label" => "Direccion", "name" => "adress"];
        $this->col[] = ["label" => "Estado", "name" => "status"];
        $this->col[] = ["label" => "Departamento", "name" => "department_id", "join" => "departments,name"];
        $this->col[] = ["label" => "Municipio", "name" => "municipality_id", "join" => "municipalitys,name"];
//        $this->col[] = ["label" => "¿Reservada?", "name" => "is_reserved", "callback" => function ($row) {
//            if ($row->is_reserved == 1) {
//                return 'Si';
//            } else {
//                return 'No';
//            }
//        }];
//
//        $this->col[] = ["label" => "Pasarela", "name" => "payment_gateway_agent_id", "join" => "payment_gateway_agent,name"];
//        $this->col[] = ["label" => "Pagos online", "name" => "payment_gateway_agent_status"];
//        $this->col[] = ["label" => "online_payment_status", "name" => "online_payment_status"];



        if (CRUDBooster::getCurrentMethod() == "getDetail") {
            $this->col[] = ["label" => "Receptor", "name" => "who_receives"];
            $this->col[] = ["label" => "Cedula del receptor", "name" => "receives_identification_number"];
        }

        $this->col[] = ["label" => "Numero de guia", "name" => "guide_number"];
        $this->col[] = ["label" => "Description", "name" => "Description"];
        $this->col[] = ["label" => "Neto", "name" => "total", "callback_php" => 'number_format($row->total)'];
//        $this->col[] = ["label" => "Descuento", "name" => "discount"];
//        $this->col[] = ["label" => "IVA", "name" => "tax", "callback_php" => 'number_format($row->tax)'];

//      $this->col[] = ["label" => "Aplicar iva", "name" => "is_tax", "callback" => function ($row) {
//            if ($row->is_tax == 1) {
//                return 'Si';
//            } else {
//                return 'No';
//            }
//        }];
//			$this->col[] = ["label"=>"Aplicar iva","name"=>"tax","callback_php"=>'number_format($row->tax)'];
        $this->col[] = ["label" => "Grand Total", "name" => "grand_total", "callback_php" => 'number_format($row->grand_total)'];
        $this->col[] = ['label' => 'Fecha', 'name' => 'created_at'];
        # END COLUMNS DO NOT REMOVE THIS LINE

        $order_number = Orders::GetLastOrderNumber() + 1;
        $order_number = str_pad($order_number, 5, 0, STR_PAD_LEFT);
        $store_id = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first()->stores_id;

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];

        if (CRUDBooster::isSuperadmin()) {

            if (CRUDBooster::getCurrentMethod() == "getAdd") {
                $this->form[] = ['label' => 'Sede', 'name' => 'stores_id', 'type' => 'select2', 'validation' => 'required|min:1|max:255', 'datatable' => 'stores,name'];
            } else {
                $this->form[] = ['label' => 'Sede', 'name' => 'stores_id', 'type' => 'text', 'readonly' => 'true'];
            }

        } else {

            $this->form[] = ['label' => 'Sede', 'name' => 'stores_id', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'readonly' => 'true', 'value' => $store_id];
        }

        if (CRUDBooster::myPrivilegeId() != "2") {
            $this->form[] = ['label' => 'Asesor', 'name' => 'user_id', 'type' => 'select2', 'datatable' => 'cms_users,name'];
        }

        $id_cms_privileges = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->select('id_cms_privileges')->first()->id_cms_privileges;
        if (CRUDBooster::isSuperadmin() || $id_cms_privileges == '3') {
            $this->form[] = ['label' => 'Cliente', 'name' => 'customers_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'datatable' => 'customers,name', 'datatable_format' => "name,' - ',phone"];
        } else {
            $this->form[] = ['label' => 'Cliente', 'name' => 'customers_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'datatable' => 'customers,name', 'datatable_format' => "name,' - ',phone", "datatable_where" => "stores_id = $store_id", "datatable_where" => "user_id = " . CRUDBooster::myId()];
        }



        $this->form[] = [
            'label' => 'Metodo de pago',
            'name' => 'payment_methods', 'type' => 'select2',
            'validation' => 'required|min:0',
            'dataenum' =>
                 PaymentMethods::PAGO_CONTRA_ENTREGA."|". (PaymentMethods::getNamePaymentMethodsByCode( PaymentMethods::PAGO_CONTRA_ENTREGA)).";"
                .PaymentMethods::TRANSFERENCIA."|".(PaymentMethods::getNamePaymentMethodsByCode(PaymentMethods::TRANSFERENCIA)).";"
                .PaymentMethods::COMPRA_ONLINE."|".(PaymentMethods::getNamePaymentMethodsByCode(PaymentMethods::COMPRA_ONLINE   ))
        ];

//        $this->form[] = ['label' => 'Metodo de pago', 'name' => 'payment_methods', 'type' => 'select2', 'validation' => 'required|min:0', 'width' => 'col-sm-8', 'dataenum' => '1|1 Numero Errado;2|2 Referidor;3|3 Aliado;4|4 Wifi Express;10|10 Muy Costoso;20|20 No Cobertura;30|30 Baja Probabilidad;40|40 Zona Roja;50|50 Por Confirmar;60|60 Declinada (Razones Especial);70|70 Alta Probabilidad;80|80 No Pasa Score;90|90 Pasa Score;100|100 Venta Ingresada'];




//            $this->form[] = ["label"=>"Agente de envio","name"=>"shipping_agent_id","join"=>"shipping_agents,name"];
        $this->form[] = ['label' => 'Agente de envio', 'name' => 'shipping_agent_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'datatable' => 'shipping_agents,name', 'datatable_format' => "name"];
        $this->form[] = ['label' => 'Direccion', 'name' => 'adress', 'type' => 'text'];
        $this->form[] = ['label' => 'Departamento', 'type' => 'select', 'name' => 'department_id', 'datatable' => 'departments,name'];
        $this->form[] = ['label' => 'Municipio', 'type' => 'select', 'name' => 'municipality_id', 'datatable' => 'municipalitys,name', 'parent_select' => 'department_id'];
        $this->form[] = ['label' => 'Receptor', 'name' => 'who_receives', 'type' => 'text', 'validation' => 'min:1|max:255',];
        $this->form[] = ['label' => 'Cedula del receptor', 'name' => 'receives_identification_number', 'type' => 'number', 'validation' => 'numeric',];

        if(CRUDBooster::myPrivilegeId()== CmsUser::OperadorBodega|| CRUDBooster::isSuperadmin() || CRUDBooster::myPrivilegeId()== CmsUser::AdministradorDeTienda){
           $this->form[] = ['label' => 'Numero de guia', 'name' => 'guide_number', 'type' => 'number', 'validation' => 'numeric|min:1|unique:orders',];
        }



        if ( CRUDBooster::myPrivilegeId()== CmsUser::OperadorBodega|| CRUDBooster::isSuperadmin()) {
            $this->form[] = ['label' => 'Comision asesor', 'name' => 'commission', 'type' => 'money', 'width' => 'col-sm-10', 'value' => 0];
            $this->form[] = ['label' => 'Costo de envio', 'name' => 'shipping_cost', 'type' => 'money', 'width' => 'col-sm-10', 'value' => 0];
        }

//        if(CRUDBooster::isSuperadmin()){
            $this->form[] = ['label'=>'Fecha De Entrega','name'=>'delivery_date_time','type'=>'datetime','width'=>'col-sm-10','readonly'=>true];
//        }
            $this->form[] = ['label' => 'Descripcion', 'name' => 'Description', 'type' => 'textarea', 'validation' => 'min:1|max:255','readonly'=>true];


        if (CRUDBooster::getCurrentMethod() != "getEdit") {

            $this->form[] = ['label' => 'Numero de Orden', 'name' => 'order_number', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'value' => $order_number, 'readonly' => true];

            // $this->form[] = ['label'=>'Estado','name'=>'status','type'=>'text','readonly'=>true];
            $columns = [];
            $columns[] = ['label' => 'Producto', 'name' => 'products_id', 'type' => 'datamodal', 'datamodal_table' => 'products', 'datamodal_columns' => 'name,type,sku,price', 'datamodal_select_to' => 'price:products_price,sku:products_sku', 'required' => true];
            // $columns[] = ['label'=>'Product SKU','name'=>'products_sku','type'=>'text','readonly'=>true,'required'=>true];
//                $columns[] = ['label'=>'Producto Price','name'=>'products_price','type'=>'number','readonly'=>true,'required'=>true];
            $columns[] = ['label' => 'Cantidad', 'name' => 'quantity', 'type' => 'number', 'required' => true];
            if (CRUDBooster::getCurrentMethod() == "getAdd") {
                $columns[] = ['label' => 'Precio de venta', 'name' => 'sale_price', 'type' => 'text', 'required' => true, 'help' => 'Precio de venta por unidad'];
                $columns[] = ['label' => 'Descuento', 'name' => 'discount', 'type' => 'number', 'required' => true, 'readonly' => true, 'required' => true, 'help' => '% Porcentaje de descuento por producto'];
            }

//                $columns[] = ['label'=>'Sub Total','name'=>'sub_total','type'=>'number','formula'=>'[products_price] * [quantity]','readonly'=>true,'required'=>true];
            $this->form[] = ['label' => 'Order Detail', 'name' => 'order_detail', 'type' => 'child', 'columns' => $columns, 'table' => 'orders_detail', 'foreign_key' => 'orders_id'];

            if (CRUDBooster::getCurrentMethod() == "getDetail") {

//                    $this->form[] = ['label'=>'Numero de Orden','name'=>'order_number','type'=>'text','validation'=>'required|min:1|max:255','value'=>$order_number,'readonly'=>true];
                // $this->form[] = ['label'=>'Estado','name'=>'status','type'=>'text','readonly'=>true];
                $archivos = [];
                $archivos[] = ['label' => 'Nombre', 'name' => 'name', 'type' => 'text'];
                // $columns[] = ['label'=>'Product SKU','name'=>'products_sku','type'=>'text','readonly'=>true,'required'=>true];
                $archivos[] = ['label' => 'Archivo', 'name' => 'image', 'type' => 'upload'];
                $archivos[] = ['label' => 'Descripción', 'name' => 'Description', 'type' => 'text'];
                $this->form[] = ['label' => 'Archivos', 'name' => 'order_files_detail', 'type' => 'child', 'columns' => $archivos, 'table' => 'order_files_detail', 'foreign_key' => 'orders_id'];


                if (CRUDBooster::myPrivilegeId() == '3' || CRUDBooster::isSuperadmin()) {

                    $inventory = [];
                    $inventory[] = ['label' => 'Imei', 'name' => 'imei', 'type' => 'text'];
                    $inventory[] = ['label' => 'Referencia    ', 'name' => 'reference', 'type' => 'text'];
                    $this->form[] = ['label' => 'Productos descontados', 'name' => 'inventory', 'type' => 'child', 'columns' => $inventory, 'table' => 'inventory', 'foreign_key' => 'order_id'];

                }

                $this->form[] = ['label' => 'Valor neto', 'name' => 'total', 'type' => 'number', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'readonly' => 'true', 'value' => 0];
                $this->form[] = ['label' => 'Iva', 'name' => 'tax', 'type' => 'number', 'value' => '19', 'readonly' => true, 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'value' => 0];
                $this->form[] = ['label' => 'Total pagar', 'name' => 'grand_total', 'type' => 'number', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'readonly' => true, 'value' => 0];

            }

            # END FORM DO NOT REMOVE THIS LINE

        }

        if (CRUDBooster::getCurrentMethod() == "getDetail" || CRUDBooster::getCurrentMethod() == "getAdd") {

            if (CRUDBooster::getCurrentMethod() == "getDetail"){
              $this->form[] = ['label' => 'Descuento', 'name' => 'discount', 'type' => 'number', 'width' => 'col-sm-10', 'value' => 0];
            }

//            $iva = str_replace("0.", "", Orders::getIva());
//            $this->form[] = ['label' => 'IVA ' . $iva . "%", 'name' => 'is_fax', 'type' => 'checkbox', 'width' => 'col-sm-10', 'dataenum' => "1|APLICAR"];

        }


        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Customers Id","name"=>"customers_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"customers,name"];
        //$this->form[] = ["label"=>"Order Number","name"=>"order_number","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Total","name"=>"total","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Tax","name"=>"tax","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Discount","name"=>"discount","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Grand Total","name"=>"grand_total","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
        # OLD END FORM

        /*
        | ----------------------------------------------------------------------
        | Sub Module
        | ----------------------------------------------------------------------
        | @label          = Label of action
        | @path           = Path of sub module
        | @button_color   = Bootstrap Class (primary,success,warning,danger)
        | @button_icon    = Font Awesome Class
        | @parent_columns = Sparate with comma, e.g : name,created_at
        |
        */
        $this->sub_module = array();


        /*
        | ----------------------------------------------------------------------
        | Add More Action Button / Menu
        | ----------------------------------------------------------------------
        | @label       = Label of action
        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
        | @icon        = Font awesome class icon. e.g : fa fa-bars
        | @color 	   = Default is primary. (primary, warning, succecss, info)
        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
        |
        */
        $this->addaction = array();

        $pendiente = Orders::PENDIENTE;
        $cancelada = Orders::CANCELADA;
        $entregado = Orders::ENTREGADO;
        $incompleta = Orders::INCOMPLETO;

        $id_cms_privileges = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->select('id_cms_privileges')->first()->id_cms_privileges;
        if (CRUDBooster::isSuperadmin() || $id_cms_privileges == '3') {
            // agregar ( -!- ) en el label si desea que sea confirmada la accion
            $this->addaction[] = [
                'label' => 'Siguiente estado',
                'url' => CRUDBooster::mainpath('set-status/next-status-order/[id]'),
                'icon' => 'fa fa-paper-plane',
                'color' => 'success',
                'showIf' => "[status] != $entregado && [status] != $cancelada &&  [status] != $incompleta"
            ];

            $this->addaction[] = [
                'label' => 'Completar orden',
                'url' => CRUDBooster::mainpath('set-status/to-fill-order/[id]'),
                'icon' => 'fa fa-retweet',
                'color' => 'success',
                'showIf' => "[status] ==  $pendiente || [status] == $cancelada || [status] == $incompleta"
            ];

            $this->addaction[] = [
                'label' => 'Cancelar orden-!-',
                'url' => CRUDBooster::mainpath('set-status/cancel-order/[id]'),
                'icon' => 'fa fa-times',
                'color' => 'success',
                'showIf' => "[status] != $entregado && [status] != $cancelada ",
                // 'showIf'=>"[status] != 'CANCELADA'"
            ];


        }

        $this->addaction[] = [
            'label' => 'Ver Pedido',
            'url' => '/admin/ViewOrdersDetail?id=[id]',
            'icon' => 'fa fa-ticket',
            'color' => 'success',
//                'showIf' => "",
            // 'showIf'=>"[status] != 'CANCELADA'"
        ];



        /*
        | ----------------------------------------------------------------------
        | Add More Button Selected
        | ----------------------------------------------------------------------
        | @label       = Label of action
        | @icon 	   = Icon from fontawesome
        | @name 	   = Name of button
        | Then about the action, you should code at actionButtonSelected method
        |
        */
        $this->button_selected = array();
        // $this->button_selected[] = ['label'=>'Rellenar Orden','icon'=>'fa fa-circle-thin','name'=>'toCompleted'];
        // $this->button_selected[] = ['label'=>'Cancelar Orden','icon'=>'fa fa-times','name'=>'toCancel'];


        /*
        | ----------------------------------------------------------------------
        | Add alert message to this module at overheader
        | ----------------------------------------------------------------------
        | @message = Text of message
        | @type    = warning,success,danger,info
        |
        */
        $this->alert = array();


        /*
        | ----------------------------------------------------------------------
        | Add more button to header button
        | ----------------------------------------------------------------------
        | @label = Name of button
        | @url   = URL Target
        | @icon  = Icon from Awesome.
        |
        */
        $this->index_button = array();


        /*
        | ----------------------------------------------------------------------
        | Customize Table Row Color
        | ----------------------------------------------------------------------
        | @condition = If condition. You may use field alias. E.g : [id] == 1
        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.
        |
        */
        $this->table_row_color = array();


        /*
        | ----------------------------------------------------------------------
        | You may use this bellow array to add statistic at dashboard
        | ----------------------------------------------------------------------
        | @label, @count, @icon, @color
        |
        */
        $this->index_statistic = array();

        $store_id = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first()->stores_id;

        if (CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial) {

            $this->index_statistic[] = ['label' => 'ORDENES DEL MES', 'count' => Orders::where('user_id', '=', CRUDBooster::myId())->where('status', '!=', Orders::CANCELADA)->where('stores_id', '=', $store_id)->lastMonth()->count(), 'icon' => 'fa fa-check', 'color' => 'green', "link" => url("#")];

        }
        if ( CRUDBooster::myPrivilegeId() == CmsUser::Coordinador || CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial ){
            $this->index_statistic[] = ['label' => 'MI CARTERA', 'count' => $this->PaymentReportsInterface->getPaymentReportByCmsUserId(CRUDBooster::myId())['money']??"$0",'icon' => 'fa fa-money', 'color' => 'green'];
        }

        if ( CRUDBooster::myPrivilegeId() == CmsUser::Coordinador || CRUDBooster::isSuperadmin() || CRUDBooster::myPrivilegeId() == CmsUser::OperadorBodega || CRUDBooster::myPrivilegeId() == CmsUser::AdministradorDeTienda ) {

            $this->index_statistic[] = ['label' => 'MIS ORDENES DEL MES', 'count' => Orders::where('user_id', '=', CRUDBooster::myId())->where('status', '!=', Orders::CANCELADA)->where('stores_id', '=', $store_id)->lastMonth()->count(), 'icon' => 'fa fa-check', 'color' => 'green', "link" => url("#")];
            $this->index_statistic[] = ['label' => 'ORDENES TOTAL DEL MES', 'count' => Orders::where('status', '!=', Orders::CANCELADA)->where('stores_id', '=', $store_id)->lastMonth()->count(), 'icon' => 'fa fa-check', 'color' => 'green', "link" => url("#")];

        }
//
//            if(CRUDBooster::isSuperadmin()){
//                $this->index_statistic[] = ['label' => 'Total por contactar', 'count' =>  Prospectos::where('status','=','Por Contactar')->count()  , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'yellow', "link" => url("#")];
//                $this->index_statistic[] = ['label' => 'Total No contestaron', 'count' => Prospectos::where('status','=','No Contesta - Buzon de voz')->count() , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'red', 'link' => url('#')];
//            }


        /*
        | ----------------------------------------------------------------------
        | Add javascript at body
        | ----------------------------------------------------------------------
        | javascript code in the variable
        | $this->script_js = "function() { ... }";
        |
        */


//            child = $('#001p')[0].remove();
//            element = document.createElement('p');
//            element.innerHTML = 'Añadidos ' + cantidadActual + ' de ' + cantidad;
//            element.setAttribute('id', '001p');
//            document.getElementsByClassName('panel-heading')[3].append(element);



        if (CRUDBooster::getCurrentMethod() == "getDetail") {

            $PaymentMethods = PaymentMethods::get();

            $map['A5'] = "dasdas";
            foreach ($PaymentMethods as $index => $item ){

             $map[$item->identifier_code] .= $item->name;

            }

            $this->script_js = "

             let codes = ".json_encode($map).";

                let list = document.querySelectorAll('td');

                    list.forEach(function (item){

                      if ( codes[item.innerText] != null ) {
                          item.innerText = codes[item.innerText] ;
                      }

                    });

            ";
        }

        if (CRUDBooster::getCurrentMethod() == "getIndex") {




            $this->script_js = "


             let fechaHoy = ".json_encode(now()->format('Y-m-d'))."
             let statusCa = ".json_encode(Orders::CANCELADA).";
             let statusEn = ".json_encode(Orders::ENTREGADO).";
             let statusIn = ".json_encode(Orders::INCOMPLETO).";
             let statusEnVa = ".json_encode(Orders::EN_VALIDACION).";


                let list = document.querySelectorAll('td');



                    list.forEach(function (item){

                      if ( item.innerText.includes(fechaHoy) ) {

                         item.setAttribute('style', 'background: #F7F7A099 !important;box-shadow: 0 25px 25px #F7F7A099  !important;color:black;font-weight:200;');
                         item.innerText += ' *Hoy* ';
                      }

                      if (item.innerText == statusCa ) {
                         item.setAttribute('style', 'background: #F7A0A099 !important;box-shadow: 0 0px 25px #F7A0A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == statusEn ) {
                         item.setAttribute('style', 'background: #AAF7A099 !important;box-shadow: 0 0px 25px #AAF7A099 !important;color:black;font-weight:200;');
                      }

                      if(item.innerText == statusIn){
                         item.setAttribute('style', 'background: #F7F7A099 !important;box-shadow: 0 0px 25px #F7F7A099  !important;color:black;font-weight:200;');
                      }

                      if(item.innerText == statusEnVa){
                         item.setAttribute('style', 'background: #A8DAF899 !important;box-shadow: 0 0px 25px #A8DAF899  !important;color:black;font-weight:200;');
                      }

                    });

            ";
        }

//        dd(StockRepo::getLastStock($store_id));

        if (CRUDBooster::getCurrentMethod() == "getAdd") {

            $store_id = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first()->stores_id;
//                dd(StockRepo::getLastStock($store_id));
            //TODO IMPLEMET SELECT SEDE IN SUPER ADMIN
            if (!CRUDBooster::isSuperadmin()) {
                $stock = StockRepo::getLastStock($store_id);
            } else {
                $stock = StockRepo::getLastStock($store_id ?? 1);
            }

            $this->script_js = "

                const formatter = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0
                });


                let stocks = ".json_encode($stock).";
                let current_product;

                let last_product_name = '';
                let ref = document.getElementsByClassName('panel-body child-form-area')[0];
                let nameProduct = '';
                let discount = 0;
                let buttom2;
                let quantity = 1;
                let sale_price = 0;
                let real_price = 0;


                element = document.createElement('p');
                element2 = document.createElement('strong');
                element.innerHTML = 'Selecciona un producto';
                element.setAttribute('id', '001p');
                element2.appendChild(element);
                document.getElementsByClassName('panel-body child-form-area')[0].append(element2);

                createText();

                setInterval(calculate_discount, 1000);

                function calculate_discount() {

                    format();

                    cantidadActual = document.getElementById('table-orderdetail')?.childNodes[3]?.childNodes;

                    let total_price_calc = 0;
                    cantidadActual.forEach(function (item) {
                        if (item?.tagName == 'TR' && item.className != 'trNull') {
                                 total_price_calc += parseInt(item.childNodes[2].childNodes[1].value.replaceAll(',', '')) * parseInt(item.childNodes[1].childNodes[1].value)  ;

                            editText(document.getElementsByClassName('panel-heading')[3], 'total_price', formatter.format(total_price_calc));
                        }
                    });

                    nameProduct = document.getElementsByClassName('form-control input-label required')[0].value;

                    if (nameProduct) {
                        current_product = stocks.filter(stock => stock.name.includes(nameProduct));
                    }


                    if (nameProduct) {

                        if (nameProduct != last_product_name) {
                            document.getElementById('orderdetailquantity').value = 1;
                            document.getElementById('orderdetailsale_price').value = current_product[0].commercial_sale_price;
                            last_product_name = nameProduct;
                            format();
                        }

                        quantity = document.getElementById('orderdetailquantity').value;
                        sale_price = document.getElementById('orderdetailsale_price').value.replace('$', '').replace(',', '').replace(/[^0-9]/g, '') * quantity;

                        real_price = current_product[0].price * quantity ?? null;

                        discount = ((real_price - sale_price) / real_price) * 100;

                        document.getElementById('orderdetaildiscount').value = discount;

                        child = $('#001p')[0].remove();
                        element = document.createElement('p');
                        element2 = document.createElement('strong');
                        element.innerHTML = current_product[0].price != 0 ? 'Precio de una unidad del Producto Selecionado: ' + formatter.format(current_product[0].price) : 'No hay Stock de producto selecionado';
                        element.setAttribute('id', '001p');
                        element2.appendChild(element);
                        document.getElementsByClassName('panel-body child-form-area')[0].append(element2);
                    }

                    buttom2 = document.getElementById('btn-add-table-orderdetail');
                    if (quantity == 0 || sale_price == 0 || real_price == 0 || discount < 0) {

                        buttom2.disabled = true;

                    } else {

                        buttom2.disabled = false;

                    }
                }

                function createText() {
                    let element = document.createElement('p');
                    element.innerHTML = 'Precio total de la orden : $0';
                    element.setAttribute('id', 'total_price');
                    document.getElementsByClassName('panel-heading')[3].append(element);
                }


                function editText(ref, id, value) {
                    let child = document.getElementById(id);
                    child.remove();

                    element = document.createElement('p');
                    strong = document.createElement('strong');
                    element.innerHTML = 'Precio total de la orden : ' + value;
                    strong.setAttribute('id', id);
                    strong.appendChild(element);
                    ref.append(strong);
                }

                function format() {
                    let value = document.getElementById('orderdetailsale_price').value.replace('$', '').replace(',', '').replace(/[^0-9]/g, '');
                    document.getElementById('orderdetailsale_price').value = formatter.format(value).toString().replace('$', '');
                }
	        ";

        }


        /*
        | ----------------------------------------------------------------------
        | Include HTML Code before index table
        | ----------------------------------------------------------------------
        | html code to display it before index table
        | $this->pre_index_html = "<p>test</p>";
        |
        */
        if (CRUDBooster::getCurrentMethod() == "getIndex") {
            $this->pre_index_html = '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        }


        /*
        | ----------------------------------------------------------------------
        | Include HTML Code after index table
        | ----------------------------------------------------------------------
        | html code to display it after index table
        | $this->post_index_html = "<p>test</p>";
        |
        */
        $this->post_index_html = null;


        /*
        | ----------------------------------------------------------------------
        | Include Javascript File
        | ----------------------------------------------------------------------
        | URL of your javascript each array
        | $this->load_js[] = asset("myfile.js");
        |
        */

        if (CRUDBooster::getCurrentMethod() == "getAdd" || CRUDBooster::getCurrentMethod()  == "getEdit") {
            $this->load_js[] = asset("/js/AddOrEtidAll.js");
        }

        if (CRUDBooster::getCurrentMethod() == "getIndex") {
            $this->load_js[] = asset("/js/Utils/ChangeActions.js");
        }


        /*
        | ----------------------------------------------------------------------
        | Add css style at body
        | ----------------------------------------------------------------------
        | css code in the variable
        | $this->style_css = ".style{....}";
        |
        */


          if (CRUDBooster::getCurrentMethod() == "getIndex") {
              $this->style_css = "
                  .swal2-html-container {
                    overflow-x: hidden !important;
                  }
            ";
          }

//        $this->style_css = "
//            @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');
//            *{
//             font-family: 'Comfortaa', cursive;
//        }";


        /*
        | ----------------------------------------------------------------------
        | Include css File
        | ----------------------------------------------------------------------
        | URL of your css each array
        | $this->load_css[] = asset("myfile.css");
        |
        */
        $this->load_css[] = asset("/css/All.css");
    }


    /*
    | ----------------------------------------------------------------------
    | Hook for button selected
    | ----------------------------------------------------------------------
    | @id_selected = the id selected
    | @button_name = the name of button
    |
    */

    public function actionButtonSelected($id_selected, $button_name)
    {

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate query of index result
    | ----------------------------------------------------------------------
    | @query = current sql query
    |
    */
    public function hook_query_index(&$query)
    {

        $id_cms_privileges = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->select('id_cms_privileges')->first()->id_cms_privileges;

        $query->where(function ($query) {
            $query->where('orders.is_reserved', '!=',true)
                ->Orwhere('online_payment_status','=',OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_PAGADO);
        });

        if ( CRUDBooster::myPrivilegeId() == CmsUser::Coordinador||  CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial) {
          $query->where('orders.status', '!=',Orders::CANCELADA);
        }

        if (!CRUDBooster::isSuperadmin()) {
            $store_id = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first()->stores_id;
            $query->where('orders.stores_id', $store_id);
        }

        if ($id_cms_privileges == CmsUser::AsesorComercial) {
            $query->where('orders.user_id', CRUDBooster::myId())->where('orders.stores_id', CmsUser::getStoresId());
        }

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate row of index table html
    | ----------------------------------------------------------------------
    |
    */
    public function hook_row_index($column_index, &$column_value)
    {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before add data is executex
    | ----------------------------------------------------------------------
    | @arr
    |
    */
    public function hook_before_add(&$postdata)
    {
//            dd(request()['orderdetail-discount']);

        try {

            $productsId = request()['orderdetail-products_id'];
            if ($productsId == null) {
                CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Añada por lo menos un producto", "info");
            }

            $quantity = request()['orderdetail-quantity'];
            $discounts = request()['orderdetail-discount'];
            $listProducts = [];
            for ($i = 0; $i < sizeof($productsId); $i++) {

                $listGetOrder = new ListProductGetOrderDTO();
                $listGetOrder->setProductId($productsId[$i]);
                $listGetOrder->setQuantity($quantity[$i]);

                $product = Products::where('id', $productsId[$i])->select('type', 'discount_kit', 'id')->first();

                if ($product->type == Products::KIT) {

                    $listGetOrder->SetIsCombo(true);
                    $listGetOrder->Setkit([

                        "discount" => $discounts[$i],
                        "kit" => productKitDetail::where('products_kit_id', $product->id)->select('products_id', 'quantity')->get()

                    ]);
                    $listGetOrder->SetDiscount(0);

                }

                if ($product->type == Products::PRODUCT) {
                    $listGetOrder->SetIsCombo(false);
//                    $listGetOrder->SetDiscount(Products::where('id','=',$productsId[$i])->select('discount_kit')->first()->discount_kit);
                    $listGetOrder->SetDiscount($discounts[$i]);
                }

                array_push($listProducts, $listGetOrder);

            }

            $store_id = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first()->stores_id;

            $getOrder = new GetOrderRequestDTO();

//            if (CRUDBooster::isSuperadmin()) {
            if (CRUDBooster::myPrivilegeId() != "2") {

                $getOrder->setUserId($postdata['user_id']);
                if (CRUDBooster::isSuperadmin()) {
                    $getOrder->setStoresId($postdata['stores_id']);
                } else {
                    $getOrder->setStoresId($store_id);
                }

            } else {
                $getOrder->setUserId(CRUDBooster::myId());
                $getOrder->setStoresId($store_id);
            }

            $getOrder->setClientId(request()->customers_id);
            $getOrder->setListProduct($listProducts);
            $getOrder->setAddress(request()->adress);
            $getOrder->setShippingAgentId(request()->shipping_agent_id);
            $getOrder->setGuideNumber(request()->guide_number);
            $getOrder->setDepartmentId(request()->department_id);
            $getOrder->setMunicipalityId(request()->municipality_id);
            $getOrder->setWhoReceives(request()->who_receives);
            $getOrder->setReceives_identification_number(request()->receives_identification_number);
            $getOrder->setDescription(request()->Description);
            $getOrder->setDiscount(request()->discount);
            $getOrder->setCommission(request()->commission);
            $getOrder->setShippingCost(request()->shipping_cost);
            $getOrder->setPaymentMethods(request()->payment_methods);
            $getOrder->setIsReserved(false);

            if (request()->is_fax) {
                $getOrder->setIsTax(true);
            } else {
                $getOrder->setIsTax(false);
            }

            $data = $this->GetOrderUseCase->save($getOrder);


            if ($data['success']) {

                $this->updateStockMongo->updateStock(CmsUser::getStoresId());
                CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Se creo la Orden exitosamente", "success");
            } else {
                CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Ocurrió un error al hacer la orden, " . $data['data'], "warning");
            }

        } catch (\Exception $exception) {
//            dd($exception);
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Ocurrió un error al hacer la orden, Mensaje: ".$exception->getMessage().",  Error Order:  ". $data['data'], "warning");
        }
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after add public static function called
    | ----------------------------------------------------------------------
    | @id = last insert id
    |
    */
    public function hook_after_add($id)
    {
        // //Your code here
        // $order_detail = DB::table('orders_detail')->where('orders_id',$id)->get();
        // foreach($order_detail as $od) {
        // 	$p = DB::table('products')->where('id',$od->products_id)->first();
        // 	DB::table('products')->where('id',$od->products_id)->update(['stock'=> abs($p->stock - $od->quantity) ]);
        // }
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before update data is execute
    | ----------------------------------------------------------------------
    | @postdata = input post data
    | @id       = current id
    |
    */
    public function hook_before_edit(&$postdata, $id)
    {
       // dd(request()->all());
        if (CRUDBooster::myPrivilegeId() != CmsUser::AsesorComercial && CRUDBooster::myPrivilegeId() != CmsUser::Coordinador  ) {
            $order = Orders::where('id', $id)->update([
                "user_id" => request()->user_id,
                'shipping_agent_id' => request()->shipping_agent_id,
                'payment_methods' => request()->payment_methods,
                "customers_id" => request()->customers_id,
                "adress" => request()->adress,
                "department_id" => request()->department_id,
                "municipality_id" => request()->municipality_id,
                "who_receives" => request()->who_receives,
                "receives_identification_number" => request()->receives_identification_number,
                "guide_number" => request()->guide_number,
                "Description" => request()->Description,
                "commission" =>str_replace(",", "", request()->commission??"0" ),
                "shipping_cost"=>str_replace(",", "", request()->shipping_cost??"0" )
            ]);
        } else {
            $order = Orders::where('id', $id)->update([
                'shipping_agent_id' => request()->shipping_agent_id,
                'payment_methods' => request()->payment_methods,
//                    'shipping_agent_status'=>request()->customers_id,
                "customers_id" => request()->customers_id,
                "adress" => request()->adress,
                "department_id" => request()->department_id,
                "municipality_id" => request()->municipality_id,
                "who_receives" => request()->who_receives,
                "receives_identification_number" => request()->receives_identification_number,
                "guide_number" => request()->guide_number,
                "Description" => request()->Description
            ]);
        }

        CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Se actualizo correctamente", "success");
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after edit public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_after_edit($id)
    {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command before delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_before_delete($id)
    {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_after_delete($id)
    {
        //Your code here
    }

    public function getSetStatus($status, $id)
    {

        if ($status == "cancel-order") {

            $isTrue = $this->GetOrderUseCase->updateCancel($id);
            if ($isTrue) {
                CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "La orden se cancelo correctamente", "success");
            } else {
                CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Error al cancelar la orden", "warning");
            }

        }

        if ($status == "next-status-order") {
            $posData = $this->GetOrderUseCase->nextStatus($id);
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $posData['message'], "info");
        }

        if ($status == "to-fill-order") {
            $posData = $this->GetOrderUseCase->toCompletedOrder($id);
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], $posData['message'], "success");
        }

    }


    //By the way, you can still create your own method in here... :)
}
