<?php namespace App\Http\Controllers;


use App\Models\CmsUser;
use App\Models\Customers;
use App\Models\Inventory;
use App\Models\Prospectos;
use App\Repositories\Google\CodeUser;
use App\Repositories\Google\ContactGoogleRepository;
use App\Repositories\Sirena\SirenaRepository;
use App\ValueObject\ContactVO;
use App\ValueObject\SimpleContactVO;
use DateTime;
use Faker\Provider\sv_SE\Municipality;
use Illuminate\Support\Facades\DB;
use Session;
use Request;
use CRUDBooster;

	class AdminProspectoController extends \crocodicstudio\crudbooster\controllers\CBController {

//        /**
//         * @var ConvertToCustomerInterface
//         */
//        private $prospectoRepositoryG;
//
//
//        /**
//         * @param ConvertToCustomerInterface $prospectoRepository
//         */
//        public function __construct(
//            ConvertToCustomerInterface $prospectoRepository
//
//        ) {
//            $this->prospectoRepositoryG = $prospectoRepository;
//
//        }

        public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "names";
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
			$this->button_import = true;
			$this->button_export = false;
			$this->table = "prospecto";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
            $this->col[] = ["label" => 'Fecha', 'name' => 'created_at'];
            $this->col[] = ["label" => 'Ultima vez', 'name' => 'updated_at'];
            $this->col[] = ["label"=>"Sede","name"=>"stores_id",'type'=>'text',"join"=>'stores,name'];
            $this->col[] = ["label"=>"Asesor","name"=>"user_id",'type'=>'text',"join"=>'cms_users,name'];

//			$this->col[] = ["label"=>"Tipo Contact","name"=>"type_prospecto_id"];
			$this->col[] = ["label"=>"Tipo","name"=>"type_prospecto_id","join"=>"type_prospectos,name"];
			$this->col[] = ["label"=>"Nombres","name"=>"names"];
			$this->col[] = ["label"=>"Apellidos","name"=>"last_names"];
            $this->col[] = ["label"=>"Telefono","name"=>"contact_1"];
//            $this->col[] = ["label"=>"Telefono 2","name"=>"contact_2"];
//            $this->col[] = ["label"=>"Correo","name"=>"email_1"];
            $this->col[] = ["label"=>"Calificación","name"=>"qualification"];
//          $this->col[] = ["label"=>"Numero de telefono","name"=>"phone_number"];
            $this->col[] = ["label"=>"Estado","name"=>"status"];
			$this->col[] = ["label"=>"Numero Documento","name"=>"document_number"];
//            $this->col[] = ["label"=>"Departamento","name"=>"department_id","join"=>"departments,name"];
            $this->col[] = ["label"=>"Municipio","name"=>"municipality_id", "join"=>"municipalitys,name"];
//            $this->col[] = ["label"=>"Dirección","name"=>"adress"];
            $this->col[] = ["label"=>"Descripcion","name"=>"description"];

            $this->col[] = ["label"=>"¿Es Cliente?","name"=>"is_client","callback" => function ($row) {
                if ($row->is_client == 1) {
                    return 'Si';
                } else {
                    return 'No';
                }
            }];

//			$this->col[] = ["label"=>"Names","name"=>"names"];
//			$this->col[] = ["label"=>"Last Names","name"=>"last_names"];
//			$this->col[] = ["label"=>"Phone Number","name"=>"phone_number"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
            $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;
            $id_cms_privileges = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->select('id_cms_privileges')->first()->id_cms_privileges;


            if( CRUDBooster::isSuperadmin() ) {
              $this->form[] = [ 'label'=>'Sede', 'name'=>'stores_id', 'type'=>'select2', 'validation'=>'required|min:1|max:255', 'datatable'=>'stores,name'];
            }else{
                $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'text','validation'=>'required|min:1|max:255', 'readonly' => 'true', 'value' =>  $store_id,"read_only"=>"true"];
            }

            if( CRUDBooster::isSuperadmin() ){
                $this->form[] = [ 'label'=>'Asesor', 'name'=>'user_id', 'type'=>'select2', 'datatable'=>'cms_users,name' ];
            }else{
                $this->form[] = [ 'label'=>'Asesor', 'name'=>'user_id', 'type'=>'select2', 'datatable'=>'cms_users,name',"datatable_where"=>"stores_id = $store_id" ];
            }

//			$this->form[] = ['label'=>'Type Contact','name'=>'type_contact','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tipo','name'=>'type_prospecto_id','type'=>'select2','validation'=>'min:1|max:255','width'=>'col-sm-10','datatable'=>'type_prospectos,name'];
			$this->form[] = ['label'=>'Nombres','name'=>'names','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Apellidos','name'=>'last_names','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
//			$this->form[] = ['label'=>'Numero de telefono','name'=>'phone_number','type'=>'number','validation'=>'numeric','width'=>'col-sm-10','placeholder'=>'Puedes introducir solo un número'];
			$this->form[] = ['label'=>'Tipo de documento','name'=>'type_document_id','type'=>'select2','validation'=>'min:1|max:255','width'=>'col-sm-10','datatable'=>'type_documents,name'];
			$this->form[] = ['label'=>'Numero Documento','name'=>'document_number','type'=>'number','validation'=>'min:0','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Contacto 1','name'=>'contact_1','type'=>'text','validation'=>'numeric|min:1','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
            $this->form[] = ['label'=>'Contacto 2','name'=>'contact_2','type'=>'text','validation'=>'numeric|min:1','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
            $this->form[] = ['label'=>'Correo 1','name'=>'email_1','type'=>'email','validation'=>'min:1|max:255|email|unique:prospecto','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];
            $this->form[] = ['label'=>'Correo 2','name'=>'email_2','type'=>'email','validation'=>'min:1|max:255|email|unique:prospecto','width'=>'col-sm-10','placeholder'=>'Introduce una dirección de correo electrónico válida'];

            $this->form[] = ['label' => 'Departamento', 'type' => 'select', 'name' => 'department_id', 'datatable' => 'departments,name'];
            $this->form[] = ['label' => 'Municipio', 'type' => 'select', 'name' => 'municipality_id', 'datatable' => 'municipalitys,name', 'parent_select' => 'department_id'];

            $this->form[] = ['label'=>'Dirección','name'=>'adress','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
            $this->form[] = ['label' => 'Estado', 'name' => 'status', 'type' => 'select2', 'validation' => 'string', 'width' => 'col-sm-8', 'dataenum' => 'Por Contactar;Contactado;No Contesta - Buzon de voz;Numero Errado'];
            $this->form[] = ['label' => 'Calificación', 'name' => 'qualification', 'type' => 'select2', 'validation' => 'integer', 'width' => 'col-sm-8', 'dataenum' => '1|1 Numero Errado;2|2 Referidor;3|3 Aliado;4|4 Wifi Express;10|10 Muy Costoso;20|20 No Cobertura;30|30 Baja Probabilidad;40|40 Zona Roja;50|50 Por Confirmar;60|60 Declinada (Razones Especial);70|70 Alta Probabilidad;80|80 No Pasa Score;90|90 Pasa Score;100|100 Venta Ingresada'];
            $this->form[] = ['label'=>'Descripción','name'=>'description','type'=>'textarea','validation'=>'string|min:5|max:5000','width'=>'col-sm-10'];
            # END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Type Contact","name"=>"type_contact","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Type Document Id","name"=>"type_document_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"type_document,id"];
			//$this->form[] = ["label"=>"Type Prospecto Id","name"=>"type_prospecto_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"type_prospecto,id"];
			//$this->form[] = ["label"=>"Numero Documento","name"=>"numero_documento","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Names","name"=>"names","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Last Names","name"=>"last_names","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Phone Number","name"=>"phone_number","type"=>"number","required"=>TRUE,"validation"=>"required|numeric","placeholder"=>"Puedes introducir solo un número"];
			//$this->form[] = ["label"=>"Email","name"=>"email","type"=>"email","required"=>TRUE,"validation"=>"required|min:1|max:255|email|unique:prospecto","placeholder"=>"Introduce una dirección de correo electrónico válida"];
			//$this->form[] = ["label"=>"Municipality Id","name"=>"municipality_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"municipality,id"];
			//$this->form[] = ["label"=>"Department Id","name"=>"department_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"department,id"];
			//$this->form[] = ["label"=>"Adress","name"=>"adress","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Description","name"=>"description","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Qualification","name"=>"qualification","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"User Id","name"=>"user_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"user,id"];
			//$this->form[] = ["label"=>"Stores Id","name"=>"stores_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"stores,name"];
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


	        $this->addaction = array();

	        // agregar ( -!- ) en el label si desea que sea confirmada la accion
            $this->addaction[] = [
                'label'=>'Convertir en Cliente',
                'url'=>CRUDBooster::mainpath('set-status/to-fill/[id]'),
                'icon'=>'fa fa-retweet',
                'color'=>'success',
                'showIf'=>" [is_client] == null || [is_client] == 0"
            ];

            $this->addaction[] = ['url' => CRUDBooster::mainpath('set-whatsapp/[id]'), 'label' => 'Actualizar en Whatsapp', 'icon' => 'fa fa-whatsapp', 'color' => 'success'];
//            $this->addaction[] = ['url' => CRUDBooster::mainpath('set-sirena/[id]'), 'label' => 'Sirena', 'icon' => 'fa fa-retweet', 'color' => 'success'];
//            $this->addaction[] = ['url' => CRUDBooster::mainpath('set-whatsapp/[id]'), 'label' => 'SMS', 'icon' => 'fa fa-send', 'color' => 'success'];
              // $this->addaction[] = ['url' => CRUDBooster::mainpath('set-contacto/[id]'), 'label' => '' , 'icon' => 'fa fa-users', 'color' => 'green'];
//            $this->addaction[] = ['url' => CRUDBooster::mainpath('set-oportunidad/[id]'), 'label' => 'Convertir a Oportunidad', 'icon' => 'fa fa-dollar', 'color' => 'info'];




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
                $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;

                if(CRUDBooster::myPrivilegeId() == '2' ){
                    $this->index_statistic[] = ['label' => 'Mis por contactar', 'count' =>  Prospectos::where('user_id', '=', CRUDBooster::myId())->where('stores_id','=',$store_id)->where('status','=','Por Contactar')->count()  , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'yellow', "link" => url("#")];
                    $this->index_statistic[] = ['label' => 'No contestaron', 'count' => Prospectos::where('user_id', '=', CRUDBooster::myId())->where('stores_id','=',$store_id)->where('status','=','No Contesta - Buzon de voz')->count() , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'red', 'link' => url('#')];
                }

                if(CRUDBooster::myPrivilegeId() == '5' ){
                    $this->index_statistic[] = ['label' => 'Total por contactar', 'count' =>  Prospectos::where('stores_id','=',$store_id)->where('status','=','Por Contactar')->count()  , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'yellow', "link" => url("#")];
                    $this->index_statistic[] = ['label' => 'no contestaron', 'count' => Prospectos::where('stores_id','=',$store_id)->where('status','=','No Contesta - Buzon de voz')->count() , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'red', 'link' => url('#')];
                }

                if(CRUDBooster::isSuperadmin()){
                    $this->index_statistic[] = ['label' => 'Total por contactar', 'count' =>  Prospectos::where('status','=','Por Contactar')->count()  , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'yellow', "link" => url("#")];
                    $this->index_statistic[] = ['label' => 'Total No contestaron', 'count' => Prospectos::where('status','=','No Contesta - Buzon de voz')->count() , 'icon' => 'fa fa-exclamation-triangle', 'color' => 'red', 'link' => url('#')];
                }


//            }


	        /*
	        | ----------------------------------------------------------------------
	        | Add javascript at body
	        | ----------------------------------------------------------------------
	        | javascript code in the variable
	        | $this->script_js = "function() { ... }";
	        |
	        */

            if( CRUDBooster::getCurrentMethod() == "getIndex" ){

                $this->script_js = "
                    let list = document.querySelectorAll('td');

                    list.forEach(function (item){
                      if (item.innerText == 'Por Contactar') {
                       item.setAttribute('style', 'background: #F7F7A099 !important;box-shadow: 0 15px 25px #F7F7A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == 'Contactado') {
                        item.setAttribute('style', 'background: #AAF7A099 !important;box-shadow: 0 15px 25px #AAF7A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == 'No Contesta - Buzon de voz') {
                        item.setAttribute('style', 'background: #F7A0A099 !important;box-shadow: 0 15px 25px #F7A0A099  !important;color:black;font-weight:200;');
                      }

                      if (item.innerText == 'Numero Errado') {
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
            if (CRUDBooster::getCurrentMethod() == "getIndex") {
                $this->pre_index_html = '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            }


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
//	        $this->load_css = array();
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

            $id_cms_privileges = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->select('id_cms_privileges')->first()->id_cms_privileges;
            $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;
            if ( !CRUDBooster::isSuperadmin()  ) {

                $query->where('prospecto.stores_id',  $store_id);
            }

//            $id_cms_privileges = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->select('id_cms_privileges')->first()->id_cms_privileges;
//            if (!CRUDBooster::isSuperadmin() && $id_cms_privileges != "3"  ) {
            if ( $id_cms_privileges == "2" ) {
                $query->where('prospecto.user_id',  CRUDBooster::myId())->where('prospecto.stores_id',  $store_id)->orderBy('prospecto.updated_at','desc')->orderBy('prospecto.created_at','desc');
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

	        if(CRUDBooster::myPrivilegeId() == CmsUser::AsesorComercial ){

                $prospecto = Prospectos::where('contact_1',$postdata['contact_1'])->orWhere('contact_2',$postdata['contact_2'])->first();

                if($prospecto->user_id == null && $prospecto != null){

                    $prospecto->update($postdata);

                    $this->getSetWhatsapp($prospecto['id']);

                    CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Datos guardados correctamente", "success");
                }

            }



           $rules = [
                'contact_1' => 'required|unique:prospecto',
                'contact_2' => $postdata['contact_2'] != null?'unique:prospecto':''
           ];

            $messages = [
                'contact_1.unique' => 'El numero telefonico ya existe',
                'contact_2.unique' => 'El numero telefonico ya existe',
                'contact_1.required' => 'El numero telefonico no puede estar vacio'
            ];

            request()->validate($rules, $messages);

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {

            $this->getSetWhatsapp($id);

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

            $prospecto = Prospectos::where('id',$id)->first();

            if($prospecto->is_client == true){

                $Customers = Customers::where('phone', $prospecto->contact_1)
                    ->update(
                        [
                            'user_id' =>$prospecto->user_id,
                            'stores_id' =>$prospecto->stores_id,
                            'name' =>$prospecto->names,
                            'last_name' =>$prospecto->last_names,
                            'address' =>$prospecto->adress,
                            'phone' =>$prospecto->contact_1,
                            'phone_other' =>$prospecto->contact_2,
                            'email' => $prospecto->email_1!=null?$prospecto->email_1:$prospecto->email_2,
                            'department_id' => $prospecto->department_id,
                            'municipality_id'=> $prospecto->municipality_id,
                            'type_document_id'=> $prospecto->type_document_id,
                            'identification_number' => $prospecto->document_number,
                            'description' => $prospecto->description
                        ]
                    );



            }

            $this->getSetWhatsapp($id);




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

        public function getSetStatus($status,$id) {

            if($status == "to-fill"){

                try {
                    $prospecto = Prospectos::where('id',$id)->first();

                    $order = Customers::create(
                        [
                            'user_id' =>$prospecto->user_id,
                            'stores_id' =>$prospecto->stores_id,
                            'name' =>$prospecto->names,
                            'last_name' =>$prospecto->last_names,
                            'address' =>$prospecto->adress,
                            'phone' =>$prospecto->contact_1,
                            'phone_other' =>$prospecto->contact_2,
                            'email' => $prospecto->email_1!=null?$prospecto->email_1:$prospecto->email_2,
                            'department_id' => $prospecto->department_id,
                            'municipality_id'=> $prospecto->municipality_id,
                            'type_document_id'=> $prospecto->type_document_id,
                            'identification_number' => $prospecto->document_number,
                            'description' => $prospecto->description
                        ]
                    );

                    Prospectos::where('id', $id)->update(['is_client' => '1']);

                    CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"El prospecto $prospecto->names !Ya es un Cliente!","success");
                }catch (\Exception $e){
                    CRUDBooster::redirect($_SERVER['HTTP_REFERER'],$e->getMessage());
                }


            }
        }

    public function getSetWhatsapp($id)
    {

        $prospecto = Prospectos::findorfail($id);
        $municipalitys = DB::table('municipalitys')->where('id', '=', $prospecto->municipality_id)->first()->name;
        $departments = DB::table('departments')->where('id', '=', $prospecto->department_id)->first()->name;
        $user_id = CmsUser::findorfail(CRUDBooster::myId());

        $names = $prospecto->names;
        $last_names = $prospecto->last_names;

      $instanceCode = new CodeUser();

      $code = $instanceCode->getCodeByID( $prospecto->user_id );



       if( $code ){

         $info = $instanceCode->varifyExistingCode( $prospecto->names.' '.$prospecto->last_names );

         if( $info['exist'] ){
             $names =trim(str_replace($info['CodeExist'],'',$names)).' '. trim($code);
             $last_names = trim(str_replace($info['CodeExist'],'',$last_names));
         }

         if(! $info['exist'] ){
             $names = trim($names).' '.$code;
         }

       }


        try{

            $contactVO = new SimpleContactVO(
                $names.' '.$last_names.' '.$municipalitys.' '.$departments,
                $prospecto->contact_1
            );

            $gooleContctRepository =  ContactGoogleRepository::saveContact(
                $contactVO
            );

            Prospectos::where('id',$prospecto->id)->update(['names'=>$names,'last_names'=>$last_names]);

        }catch (\Exception $e) {
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Error al Actualizar $e", "danger");
        };


        if($gooleContctRepository['status'] ==  true){
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Se ha guardado correctamente !", "success");
        }else{
//            dd($gooleContctRepository);
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Error al Actualizar", "danger");

        }
    }

//    public function getSetSirena($id)
//    {
//
//        $id_asesor = Prospectos::findorfail($id);
//        $municipio = \Illuminate\Support\Facades\DB::table('municipalitys')->where('id', '=', $id_asesor->municipality_id)->get();
//        $departamento = \Illuminate\Support\Facades\DB::table('departments')->where('id', '=', $municipio[0]->department_id)->get();
//        $user_id = CmsUser::findorfail(CRUDBooster::myId());
//        $contacto = [
//
//            "id" => $user_id->sirena_id,
//            "firstName" => $id_asesor->names,
//            "lastName" => $id_asesor->last_names . ' ' . $municipio[0]->name . ' ' . $departamento[0]->name,
//            "number1" => $id_asesor->contact_1,
//            "number2" => $id_asesor->contact_2,
//            "address" => $id_asesor->email_1
//
//        ];
//
//
//         $data = SirenaRepository::search($contacto);
//
////         dd( $data );
//         if($data['status'])
//         {
//             CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Se ha guardado el contacto correctamente !","success");
//         } else {
//             CRUDBooster::redirect($_SERVER['HTTP_REFERER'],$data['data']);
//         }
//
//
//
//
//    }



	    //By the way, you can still create your own method in here... :)


	}
