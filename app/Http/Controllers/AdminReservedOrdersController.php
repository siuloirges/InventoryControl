<?php namespace App\Http\Controllers;

	use App\DataTransferObjects\Orders\GetOrderRequestDTO;
    use App\DataTransferObjects\Orders\ListProductGetOrderDTO;
    use App\Models\CmsUser;
    use App\Models\OnelinePaymentStatus;
    use App\Models\Orders;
    use App\Models\PaymentMethods;
    use App\Repositories\OnlinePaymentStatus\Contracts\OnlinePaymentStatusInterface;
    use App\Repositories\Order\Contracts\EloquentOrderRepositoryInterface;
    use App\Repositories\stock\updateStockMongo\Contracts\UpdateStockMongoInterface;
    use App\UseCase\Order\Contracts\GetOrderUseCaseInterface;
    use App\UseCase\Order\GetOrderUseCase;
    use Session;
	use Request;
	use DB;
	use CRUDBooster;




	class AdminReservedOrdersController extends \crocodicstudio\crudbooster\controllers\CBController {

        /**
         * @var GetOrderUseCaseInterface
         */
        private $GetOrderUseCase;

        /**
         * @var OnlinePaymentStatusInterface
         */
        private $onlinePaymentStatusInterface;

        public function __construct(
            OnlinePaymentStatusInterface $onlinePaymentStatusInterface,
            GetOrderUseCaseInterface  $GetOrderUseCase

        )
        {

            $this->GetOrderUseCase = $GetOrderUseCase;
            $this->onlinePaymentStatusInterface = $onlinePaymentStatusInterface;
        }


        public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "orders";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
            $this->col = [];
            $this->col[] = ['label' => 'Fecha', 'name' => 'created_at'];
//            $this->col[] = ["label" => "Sede", "name" => "stores_id", 'type' => 'text', "join" => 'stores,name'];
            $this->col[] = ["label" => "Numero de orden", "name" => "order_number"];
            $this->col[] = ["label" => "Asesor", "name" => "user_id", "join" => "cms_users,name"];


            $this->col[] = ["label" => "Pasarela", "name" => "payment_gateway_agent_id", "join" => "payment_gateway_agent,name"];
            $this->col[] = ["label" => "Intentos de pago", "name" => "payment_gateway_agent_status"];
//            $this->col[] = ["label" => "Estado del pago", "name" => "online_payment_status"];


            //PaymentMethods logic
            $OnelinePaymentStatus = OnelinePaymentStatus::get();
            $map2 = null;
            foreach ($OnelinePaymentStatus as $index => $item ){
                $map2[$item->identifier_code] .= $item->name;
            }
            $val = json_encode( str_replace(['{','}','"',":",","],['llavesAbierta','llavesCerrada',"comillas","dosPuntos","coma"],json_encode($map2)) );
            $this->col[] = ["label" => "Estado del pago", "name" => "online_payment_status" ,
                "callback_php" => '
                $dataJson = '.$val.';
                if($dataJson != nul){
                $dataJson = str_replace(["llavesAbierta","llavesCerrada","comillas","dosPuntos","coma"],["{","}","\"",":",","],$dataJson) ;
                $dataJson = json_decode($dataJson);
                $map = null;
                foreach($dataJson as $key => $val ){
                  $map[$key] .= $val;
                }
                $value = $row->online_payment_status;
                if($map[$value] != null){
                   $value = $map[$value];
                }
                $row->online_payment_status=$value;
            }'];



            $this->col[] = ["label" => "Cliente", "name" => "customers_id", "join" => "customers,name"];

            //PaymentMethods logic
            $PaymentMethods = PaymentMethods::get();
            $map2 = null;
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
//            $this->col[] = ["label" => "Agente de envio", "name" => "shipping_agent_id", "join" => "shipping_agents,name"];
//            $this->col[] = ["label" => "Estado Envio", "name" => "shipping_agent_status"];
            $this->col[] = ["label" => "Direccion", "name" => "adress"];
            $this->col[] = ["label" => "Estado", "name" => "status"];
            $this->col[] = ["label" => "Departamento", "name" => "department_id", "join" => "departments,name"];
            $this->col[] = ["label" => "Municipio", "name" => "municipality_id", "join" => "municipalitys,name"];
//            $this->col[] = ["label" => "¿Reservada?", "name" => "is_reserved", "callback" => function ($row) {
//                if ($row->is_reserved == 1) {
//                    return 'Si';
//                } else {
//                    return 'No';
//                }
//            }];





            if (CRUDBooster::getCurrentMethod() == "getDetail") {
                $this->col[] = ["label" => "Receptor", "name" => "who_receives"];
                $this->col[] = ["label" => "Cedula del receptor", "name" => "receives_identification_number"];
            }

//            $this->col[] = ["label" => "Numero de guia", "name" => "guide_number"];
            $this->col[] = ["label" => "Description", "name" => "Description"];
//            $this->col[] = ["label" => "Neto", "name" => "total", "callback_php" => 'number_format($row->total)'];
//            $this->col[] = ["label" => "Descuento", "name" => "discount"];
//            $this->col[] = ["label" => "IVA", "name" => "tax", "callback_php" => 'number_format($row->tax)'];

//      $this->col[] = ["label" => "Aplicar iva", "name" => "is_tax", "callback" => function ($row) {
//            if ($row->is_tax == 1) {
//                return 'Si';
//            } else {
//                return 'No';
//            }
//        }];
//			$this->col[] = ["label"=>"Aplicar iva","name"=>"tax","callback_php"=>'number_format($row->tax)'];
            $this->col[] = ["label" => "Grand Total", "name" => "grand_total", "callback_php" => 'number_format($row->grand_total)'];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
            $this->form = [];

            if (CRUDBooster::isSuperadmin()) {

                if (CRUDBooster::getCurrentMethod() == "getAdd") {
                    $this->form[] = ['label' => 'Sede', 'name' => 'stores_id', 'type' => 'select2', 'validation' => 'required|min:1|max:255', 'datatable' => 'stores,name'];
                } else {
                    $this->form[] = ['label' => 'Sede', 'name' => 'stores_id', 'type' => 'text', 'readonly' => 'true'];
                }

            } else {

                $this->form[] = ['label' => 'Sede', 'name' => 'stores_id', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'readonly' => 'true', 'value' => CmsUser::getStoresId()];
            }

            if (CRUDBooster::myPrivilegeId() != "2") {
                $this->form[] = ['label' => 'Asesor', 'name' => 'user_id', 'type' => 'select2', 'datatable' => 'cms_users,name'];
            }

            $id_cms_privileges = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->select('id_cms_privileges')->first()->id_cms_privileges;
            if (CRUDBooster::isSuperadmin() || $id_cms_privileges == '3') {
                $this->form[] = ['label' => 'Cliente', 'name' => 'customers_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'datatable' => 'customers,name', 'datatable_format' => "name,' - ',phone"];
            } else {
                $this->form[] = ['label' => 'Cliente', 'name' => 'customers_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'datatable' => 'customers,name', 'datatable_format' => "name,' - ',phone", "datatable_where" => "stores_id = ".CmsUser::getStoresId(), "datatable_where" => "user_id = " . CRUDBooster::myId()];
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
            $this->form[] = ['label' => 'Numero de guia', 'name' => 'guide_number', 'type' => 'number', 'validation' => 'numeric|min:1|unique:orders',];


            $this->form[] = ['label' => 'Descripcion', 'name' => 'Description', 'type' => 'textarea', 'validation' => 'min:1|max:255',];

            if ( CRUDBooster::myPrivilegeId()== CmsUser::OperadorBodega|| CRUDBooster::isSuperadmin()) {
                $this->form[] = ['label' => 'Comision asesor', 'name' => 'commission', 'type' => 'money', 'width' => 'col-sm-10', 'value' => 0];
                $this->form[] = ['label' => 'Costo de envio', 'name' => 'shipping_cost', 'type' => 'money', 'width' => 'col-sm-10', 'value' => 0];
            }


            if (CRUDBooster::getCurrentMethod() != "getEdit") {

//                $this->form[] = ['label' => 'Numero de Orden', 'name' => 'order_number', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'value' => $order_number, 'readonly' => true];
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
//                    $this->form[] = ['label' => 'Iva', 'name' => 'tax', 'type' => 'number', 'value' => '19', 'readonly' => true, 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'value' => 0];
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
			# END FORM DO NOT REMOVE THIS LINE



			/*
	        | ----------------------------------------------------------------------
	        | Sub Module
	        | ----------------------------------------------------------------------
			| @label          = Label of action
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
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
            $pendiente = Orders::PENDIENTE;
            $cancelada = Orders::CANCELADA;
            $entregado = Orders::ENTREGADO;
            $incompleta = Orders::INCOMPLETO;

//            $id_cms_privileges = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->select('id_cms_privileges')->first()->id_cms_privileges;
            if (CRUDBooster::isSuperadmin() || CRUDBooster::myPrivilegeId() == CmsUser::OperadorBodega || CRUDBooster::myPrivilegeId() == CmsUser::AdministradorDeTienda) {

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
                    'label' => 'Cancelar orden',
                    'url' => CRUDBooster::mainpath('set-status/cancel-order/[id]'),
                    'icon' => 'fa fa-times',
                    'color' => 'success',
                    'showIf' => "[status] != $entregado && [status] != $cancelada ",
                    // 'showIf'=>"[status] != 'CANCELADA'"
                ];

                $this->addaction[] = [
                    'label' => 'Ver Pedido',
                    'url' => '/admin/ViewOrdersDetail?id=[id]',
                    'icon' => 'fa fa-ticket',
                    'color' => 'success',
//                'showIf' => "",
                    // 'showIf'=>"[status] != 'CANCELADA'"
                ];


            }


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


	        /*
	        | ----------------------------------------------------------------------
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------
	        | @message = Text of message
	        | @type    = warning,success,danger,info
	        |
	        */
	        $this->alert        = array();



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



	        /*
	        | ----------------------------------------------------------------------
	        | Add javascript at body
	        | ----------------------------------------------------------------------
	        | javascript code in the variable
	        | $this->script_js = "function() { ... }";
	        |
	        */
            if (CRUDBooster::getCurrentMethod() == "getIndex") {

                $this->script_js = "

             let statusCa = ".json_encode(Orders::CANCELADA).";
             let statusEn = ".json_encode(Orders::ENTREGADO).";

             let STATUS_POR_DEFINIR = ".json_encode($this->onlinePaymentStatusInterface->getNameByCode( OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_POR_DEFINIR )).";
             let STATUS_NO_PAGADO = ".json_encode($this->onlinePaymentStatusInterface->getNameByCode( OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_NO_PAGADO )).";
             let STATUS_PAGADO = ".json_encode($this->onlinePaymentStatusInterface->getNameByCode( OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_PAGADO )).";
             let STATUS_ABANDONADA = ".json_encode($this->onlinePaymentStatusInterface->getNameByCode( OnelinePaymentStatus::ONELINE_PAYMENT_STATUS_ABANDONADA )).";

                console.log(statusCa);
                let list = document.querySelectorAll('td');

                    list.forEach(function (item){

                      if (item.innerText == statusCa ) {
                         item.setAttribute('style', 'background: #F7A0A099 !important;box-shadow: 0 15px 25px #F7A0A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == statusEn ) {
                         item.setAttribute('style', 'background: #AAF7A099 !important;box-shadow: 0 15px 25px #AAF7A099  !important;color:black;font-weight:200;');
                      }

                       //Estados de pago
                       if (item.innerText == STATUS_POR_DEFINIR ) {
                         item.setAttribute('style', 'background: #F7F7A099 !important;box-shadow: 0 15px 25px #F7F7A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == STATUS_NO_PAGADO ) {
                         item.setAttribute('style', 'background: #F7A0A099 !important;box-shadow: 0 15px 25px #F7A0A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == STATUS_PAGADO ) {
                         item.setAttribute('style', 'background: #AAF7A099 !important;box-shadow: 0 15px 25px #AAF7A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == STATUS_ABANDONADA ) {
                         item.setAttribute('style', 'background: #F7A0A099 !important;box-shadow: 0 15px 25px #F7A0A099  !important;color:black;font-weight:200;');
                      }

                    });

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


	        /*
	        | ----------------------------------------------------------------------
	        | Include css File
	        | ----------------------------------------------------------------------
	        | URL of your css each array
	        | $this->load_css[] = asset("myfile.css");
	        |
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
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here

	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate query of index result
	    | ----------------------------------------------------------------------
	    | @query = current sql query
	    |
	    */
	    public function hook_query_index(&$query) {

////	        $id_cms_privileges = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->select('id_cms_privileges')->first()->id_cms_privileges;
            $query->where('orders.is_reserved',true );
//
////            if ( CRUDBooster::myPrivilegeId() == CmsUser::Coordinador || CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial ) {
////              $query->where( 'orders.status', '!=', Orders::CANCELADA );
////            }
//
            if (!CRUDBooster::isSuperadmin()) {
                $query->where('orders.stores_id', CmsUser::getStoresId());
            }



	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before add data is execute
	    | ----------------------------------------------------------------------
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before update data is execute
	    | ----------------------------------------------------------------------
	    | @postdata = input post data
	    | @id       = current id
	    |
	    */
	    public function hook_before_edit(&$postdata,$id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_edit($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_delete($id) {
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
