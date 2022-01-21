<?php namespace App\Http\Controllers;

use App\Models\CmsUser;
use App\Models\Orders;
use App\Models\PaymentReports;
use App\Reporte;
//use Barryvdh\DomPDF\PDF;
use App\Repositories\PaymentReports\PaymentReportsRepository;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use PDF;
use PHPUnit\Exception;
use Session;
use Request;

//use DB;
use CRUDBooster;

class AdminPaymentReports1Controller extends \crocodicstudio\crudbooster\controllers\CBController
{

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
        $this->button_delete = true;
        $this->button_detail = true;
        $this->button_show = true;
        $this->button_filter = true;
        $this->button_import = false;
        $this->button_export = false;
        $this->table = "payment_reports";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];

//			$this->col[] = ["label"=>"Ganancia de la empresa","name"=>"company_commission"];

//        $this->col[] = ["label" => "Sede", "name" => "stores_id", "join" => "stores,name"];
        $this->col[] = ["label" => "Mes", "name" => "mes"];
        $this->col[] = ["label" => "Usuario", "name" => "user_id", "join" => "cms_users,name"];
        $this->col[] = ["label" => "Tipo", "name" => "type_reports"];
        $this->col[] = ["label" => "Comision empleado", "name" => "employee_commission", "callback_php" => 'number_format($row->employee_commission)'];
        $this->col[] = ["label" => "Bono", "name" => "bonus", "callback_php" => 'number_format($row->bonus)'];
        $this->col[] = ["label" => "Descuento", "name" => "discount", "callback_php" => 'number_format($row->discount)'];


        $this->col[] = ["label"=>"Autorizado","name"=>"is_finished","callback" => function ($row) {
            if ($row->is_finished == 1) {
                return 'Si';
            } else if($row->employee_approval == null){
                 return 'Indefinido';
            } else {
                return 'No';
            }
        }];

        $this->col[] = ["label"=>"Aprobacion del Agente","name"=>"employee_approval","callback" => function ($row) {
            if ($row->employee_approval == 1) {
                return 'Si';
            } else if($row->employee_approval == null){
                return 'Indefinido';
            }else{
                return 'No';
            }

        }];

        $this->col[] = ["label" => "PDF", "name" => "url_pdf", "download" => true];
        # END COLUMNS DO NOT REMOVE THIS LINE


        $mes = new DateTime();
        $mes->modify('+2 month');

        $dos_meses_depues = $mes->modify('last month')->format('Y-m');
        $un_mes_depues = $mes->modify('last month')->format('Y-m');
        $mes_actual = $mes->modify('last month')->format('Y-m');
        $un_mes_antes = $mes->modify('last month')->format('Y-m');
        $dos_meses_antes = $mes->modify('last month')->format('Y-m');

        $textComision = PaymentReports::COMISION;
        $textSalario = PaymentReports::SALARIO;
        $store_id = DB::table('cms_users')->where('id', '=', CRUDBooster::myId())->first()->stores_id;

        # START FORM DO NOT REMOVE THIS LINE

        $this->form = [];
        $this->form[] = ['label' => 'Agente', 'name' => 'user_id', 'type' => 'select2', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10', 'datatable' => 'cms_users,name',"datatable_where"=>"stores_id = $store_id"];
        $this->form[] = ['label' => 'Mes', 'name' => 'mes', 'type' => 'select2', 'dataenum' => "$dos_meses_depues;$un_mes_depues;$mes_actual;$un_mes_antes;$dos_meses_antes", 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Tipo de pago', 'name' => 'type_reports', 'type' => 'select', 'dataenum' => "$textComision;$textSalario", 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Valor', 'name' => 'employee_commission', 'type' => 'money', 'width' => 'col-sm-10', 'value' => 0];
        $this->form[] = ['label' => 'bono', 'name' => 'bonus', 'type' => 'money', 'value' => 0];
        $this->form[] = ['label' => 'Concepto Bono', 'name' => 'reason_bonus', 'type' => 'textarea'];
        $this->form[] = ['label' => 'Descuento', 'name' => 'discount', 'type' => 'money', 'value' => 0];
        $this->form[] = ['label' => 'Concepto descuento', 'name' => 'reason_discount', 'type' => 'textarea'];

        //			$this->form[] = ['label'=>'ganancia de la empresa','name'=>'company_commission','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'text','validation'=>'required|min:1|max:255', 'readonly' => 'true', 'value' =>  $store_id];

//        $this->form[] = ['label' => 'PDF', 'name' => 'url_pdf', 'type' => 'upload', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Employee Commission","name"=>"employee_commission","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Company Commission","name"=>"company_commission","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Url Pdf","name"=>"url_pdf","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Stores Id","name"=>"stores_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"stores,name"];
        //$this->form[] = ["label"=>"User Id","name"=>"user_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"user,id"];
        # OLD END FORM

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
        $comision = PaymentReports::COMISION;

        $this->addaction = array();
        $this->addaction[] = ['label' => 'Ver Borrador', 'url' => CRUDBooster::mainpath('get-reporte/[id]'), 'icon' => 'fa fa-file-o', 'color' => 'danger', 'target' => '_blank','showIf'=>"[employee_approval] == 0 ||  [is_finished] == 0 "];

        if(CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial || CRUDBooster::myPrivilegeId() == CmsUser::OperadorBodega){
            $this->addaction[] = ['label' => 'Aprobar', 'url' => CRUDBooster::mainpath('get-aprobar/[id]'), 'icon' => 'fa fa-check', 'color' => 'success', 'target' => '_blank','showIf'=>"[employee_approval] == 0 ||  [is_finished] == 0 "];
        }else{
            $this->addaction[] = ['label' => 'Autorizar', 'url' => CRUDBooster::mainpath('get-autorizar/[id]'), 'icon' => 'fa fa-check', 'color' => 'success', 'target' => '_blank','showIf'=>"[employee_approval] == 0 ||  [is_finished] == 0 "];
        }
        $this->addaction[] = ['label' => 'Ver Reporte', 'url' => CRUDBooster::mainpath('get-reporte-aprobado/[id]'),'icon'=>'fa fa-file-o','color'=>'success','showIf'=>"[employee_approval] == 1 &&  [is_finished] == 1 ", 'target' => '_blank'];
       // $this->addaction[] = ['label' => 'Recalcular', 'url' => CRUDBooster::mainpath('get-recalcular/[id]'),'icon'=>'fa fa-retweet','color'=>'success','showIf'=>"[type_reports] == $comision &&  ([is_finished] == 0 || [employee_approval] == 0)", 'target' => '_blank'];

//        $this->addaction[] = ['label' => 'Descargar', 'url' => CRUDBooster::mainpath('get-reporte/[id]'), 'icon' => 'fa fa-file-o', 'color' => 'danger', 'target' => '_blank','showIf'=>"[autorizado] == 'pendiente'"];
//        $this->addaction[] = ['label' => 'Descargar', 'url' => CRUDBooster::mainpath('get-reporte-aprobado/[id]'),'icon'=>'fa fa-file-o','color'=>'success','showIf'=>"[autorizado] == 'aprobado'", 'target' => '_blank'];

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


             let mesActual = ".json_encode(now()->format('Y-m'))."
             let MesPasado = ".json_encode(now()->modify('-1 month')->format('Y-m'))."




                let list = document.querySelectorAll('td');



                    list.forEach(function (item){

                      if ( item.innerText.includes(mesActual) ) {

                         item.setAttribute('style', 'background: #3C8DBC50 !important;box-shadow: 0 5px 25px #3C8DBC50  !important;color:black;font-weight:200;');
                         item.innerText += ' *Este Mes* ';
                      }

                      if ( item.innerText.includes(MesPasado) ) {

                         item.setAttribute('style', 'background: #F7F7A050 !important;box-shadow: 0 5px 25px #F7F7A050  !important;color:black;font-weight:200;');
                         item.innerText += ' *Mes pasado* ';
                      }

                    });

            ";
        }


        if (CRUDBooster::getCurrentMethod() == "getAdd" || CRUDBooster::getCurrentMethod() == "getEdit") {
            $comision = PaymentReports::COMISION;
            $salario = PaymentReports::SALARIO;

            $this->script_js = "
            let comision = " . json_encode($comision) . "
            let salario = " . json_encode($salario) . "

	        	let selectElement = document.getElementById('type_reports');

	        		selectElement.addEventListener( 'change', (event) => {
					  resultado = document.getElementById('type_reports').value;

					if(resultado == comision ){
						document.getElementById('form-group-employee_commission').style.display = 'none';
					}

					if(resultado == salario ){
						 document.getElementById('form-group-employee_commission').style.display = null;
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
        //Your code here

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
        //Your code here

        if(CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial || CRUDBooster::myPrivilegeId() == CmsUser::OperadorBodega){
            $query->where('payment_reports.user_id',  CRUDBooster::myId())
                ->where('payment_reports.stores_id',  CmsUser::GetCurrentStore())
                ->orderBy('payment_reports.updated_at','desc')
                ->orderBy('payment_reports.created_at','desc');
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
    | Hook for manipulate data input before add data is execute
    | ----------------------------------------------------------------------
    | @arr
    |
    */
    public function hook_before_add(&$postdata)
    {

        if ( $postdata['type_reports'] == PaymentReports::COMISION ) {

            $dates = explode("-", $postdata['mes']);

            $mes = $dates[1];
            $annio = $dates[0];

           $data = PaymentReportsRepository::getPaymentReportbyIdAndDate($postdata['user_id'],$mes,$annio);

            $postdata['employee_commission'] = doubleval(str_replace(',', '', $data['money']));

        }

        if ($postdata['type_reports'] == PaymentReports::SALARIO) {

            $postdata['employee_commission'] = ($postdata['employee_commission'] + $postdata['bonus']) - $postdata['discount'];

        }

        //Your code here

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
    public function hook_before_edit(&$postdata, $id)
    {

        $reporte = PaymentReports::where('id', $id)->first();
        if($reporte->employee_approval == 1 && $reporte->is_finished == 1 ){
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "No puedes editar un Reporte Finalizado", "danger");
        }



//        if ( $postdata['type_reports'] == PaymentReports::COMISION ) {
//
//            $dates = explode("-", $postdata['mes']);
//
//            $mes = $dates[1];
//            $annio = $dates[0];
//
//            $data = PaymentReportsRepository::getPaymentReportbyIdAndDate($postdata['user_id'],$mes,$annio);
//
//
//            $postdata['employee_commission'] = (intval(str_replace(',', '', $data['money'])) + intval($postdata['bonus'])) - intval($postdata['discount']);
//
//        }
//
//        if ($postdata['type_reports'] == PaymentReports::SALARIO) {
//
//            $postdata['employee_commission'] = ($postdata['employee_commission'] + $postdata['bonus']) - $postdata['discount'];
//
//        }
        //Your code here

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
        $this->getGetRecalcular($id);
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


    public function getGetRecalcular($id)
    {
        $reporte = PaymentReports::where('id', $id)->first();

        if ( $reporte->type_reports == PaymentReports::COMISION ) {

            $dates = explode("-", $reporte->mes);

            $mes = $dates[1];
            $annio = $dates[0];

            $data = PaymentReportsRepository::getPaymentReportbyIdAndDate($reporte->user_id,$mes,$annio);
            $grandTotal = doubleval(str_replace(',', '', $data['money']));
            PaymentReports::where('id', $id)->update(['employee_commission'=>$grandTotal]);
        }

        CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Datos guardados correctamente ", "success");


    }

    public function getGetReporte($id)
    {
        $reporte = PaymentReports::where('id', $id)->first();

        $usuario = CmsUser::where('id', $reporte->user_id)->first();
        $dates = explode("-", $reporte->mes);
        $mes = $dates[1];
        $annio = $dates[0];
        $fecha = new DateTime($reporte->mes);

         $data = PaymentReportsRepository::getPaymentReportbyIdAndDate($reporte->user_id,$mes,$annio);
//        dd($data);
        $pdf =\PDF::loadView('pdf.actaconciliacion', compact('reporte', 'usuario', 'data', 'fecha'));
        return $pdf->stream("reporte.pdf");
    }

    public function getGetReporteAprobado($id)
    {
        $report = PaymentReports::where('id', $id)->first();
        return redirect($report->url_pdf);
    }


    public function getGetAutorizar($id)
    {
        PaymentReports::where('id', $id)->update(['is_finished'=>'1']);
        $reporte = PaymentReports::where('id', $id)->first();

        if($reporte->is_finished == 1 && $reporte->employee_approval ==1){
            $ruta_archivo = $this->finishReport($id);
        }
        PaymentReports::where('id', $id)->update(['url_pdf'=>$ruta_archivo]);
        CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Datos guardados correctamente ".$ruta_archivo, "success");
    }

    public function getGetAprobar($id)
    {
        PaymentReports::where('id', $id)->update(['employee_approval'=>'1']);
        $reporte = PaymentReports::where('id', $id)->first();
        if($reporte->is_finished == 1 && $reporte->employee_approval == 1){
            $ruta_archivo = $this->finishReport($id);
        }
        PaymentReports::where('id', $id)->update(['url_pdf'=>$ruta_archivo]);
//        dd(  PaymentReports::where('id', $id)->first()->url_pdf);
        CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Datos guardados correctamente ".$ruta_archivo, "success");
    }

     private function finishReport($id){
         $reporte = PaymentReports::where('id', $id)->first();
         $User = CmsUser::where('id', $reporte->user_id)->first();
         $fecha = new DateTime($reporte->mes);
         $ruta_archivo="actas/acta-conciliacion-".$fecha->format('Y-m')."-".mb_strtolower(str_replace(' ','-', trim ($User->name))).".pdf";
         $usuario = CmsUser::where('id', $reporte->user_id)->first();
         $dates = explode("-", $reporte->mes);
         $mes = $dates[1];
         $annio = $dates[0];

         $data = PaymentReportsRepository::getPaymentReportbyIdAndDate($reporte->user_id,$mes,$annio);

         $pdf =\PDF::loadView('pdf.actaconciliacion', compact('reporte', 'usuario', 'data', 'fecha'));
         file_put_contents($ruta_archivo, $pdf->stream("reporte.pdf"));
         return $ruta_archivo;
     }




    //By the way, you can still create your own method in here... :)


}
