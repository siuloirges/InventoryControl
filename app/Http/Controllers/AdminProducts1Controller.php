<?php namespace App\Http\Controllers;

use App\Models\CmsUser;
use App\Models\Orders;
use App\Models\Products;
use App\Models\SmsUsers;
use App\Models\User;
use App\Repositories\stock\StockRepo;
use App\Repositories\stock\updateStockMongo\Contracts\UpdateStockMongoInterface;
use Session;
use Request;
use DB;
use CRUDBooster;

	class AdminProducts1Controller extends \crocodicstudio\crudbooster\controllers\CBController {


        /**
         * @var UpdateStockMongoInterface
         */
        private $updateStockMongo;

        /**
         * @param UpdateStockMongoInterface $updateStockMongo
         */
        public function __construct(
            UpdateStockMongoInterface $updateStockMongo
        )
        {
            $this->updateStockMongo = $updateStockMongo;
        }

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
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
			$this->table = "products";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE

			$product = Products::PRODUCT;
			$kit = Products::KIT;

			$this->col = [];
			$this->col[] = ["label"=>"Imagen","name"=>"picture","image"=>true];
			$this->col[] = ["label"=>"Nombre","name"=>"name"];
			$this->col[] = ["label"=>"Tipo","name"=>"type"];
			$this->col[] = ["label"=>"Categoría","name"=>"categories_id","join"=>"categories,name"];
//			$this->col[] = ["label"=>"Cantidad de alerta","name"=>"minimum_ammount"];
            $this->col[] = ["label"=>"Fecha de de vencimiento","name"=>"expiration_date"];
            // $this->col[] = ["label"=>"Codigo de barras","name"=>"barcode"];
			$this->col[] = ["label"=>"Precio de venta comercial","name"=>"commercial_sale_price","callback_php"=>'number_format($row->commercial_sale_price)'];
            $this->col[] = ["label"=>"Descripción","name"=>"description"];
            $this->col[] = ['label'=>'Descripción pública','name'=>'public_description'];
            $this->col[] = ["label"=>"¿Es listado en la web?","name"=>"is_public","callback" => function ($row) {
                if ($row->is_public == 1) {
                    return 'Si';
                } else {
                    return 'No';
                }
            }];
			$this->col[] = ["label"=>"Comision Base","name"=>"commission_sale","callback_php"=>'number_format($row->commission_sale)'];
            $this->col[] = ["label"=>"Sede","name"=>"stores_id",'type'=>'text',"join"=>'stores,name'];


            # END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE

            $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->select('stores_id')->first()->stores_id;

            $this->form = [];
            if( CRUDBooster::isSuperadmin() ){
                $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'select2','validation'=>'required|min:1|max:255','datatable'=>'stores,name'];
            }else{
                $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'text','validation'=>'required|min:1|max:255', 'readonly' => 'true', 'value' =>  $store_id];
            }
			$this->form[] = ['label'=>'URL Imagen','name'=>'picture','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Nombre','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'Puedes introducir solo una letra'];
			$this->form[] = ['label'=>'Tipo','name'=>'type','type'=>'select','dataenum'=>"$product;$kit",'validation'=>'required'];
			// $this->form[] = ['label'=>'Precio','name'=>'price','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];

            $this->form[] = ['label'=>'Cantidad de alerta','name'=>'minimum_ammount','type'=>'number','width'=>'col-sm-10','placeholder'=>'Cantidad de stock minimo para alertar de poca existencia'];

            $this->form[] = ['label'=>'Fecha de vencimiento','name'=>'expiration_date','type'=>'datetime','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Codigo de barras','name'=>'Barcode','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];


            if( CRUDBooster::myPrivilegeId() == CmsUser::AdministradorDeTienda || CRUDBooster::isSuperadmin() ){
                //TODO IMPLEMET 'comision por venta' Y FECHAR DE ORDEN ENTREGADA
//                commission_sale comision del asesor o coordinador
                $this->form[] = ['label'=>'Comision Base','name'=>'commission_sale','type'=>'money','width'=>'col-sm-10','validation'=>'min:0|max:100'];

                $this->form[] = ['label' => '¿Es listado en la web?', 'name' => 'is_public', 'type' => 'select2', 'width' => 'col-sm-10', 'dataenum' => "1|SI;0|NO"];
//                is_public
            }
            $product = Products::PRODUCT;
            $consult='type="'.$product.'" AND stores_id='.$store_id;

            $columns = [];
			$columns[] = ['label'=>'Product','name'=>'products_id','type'=>'datamodal','datamodal_table'=>'products','datamodal_columns'=>'name,type,sku,commercial_sale_price','datamodal_select_to'=>'price:products_price,sku:products_sku','required'=>true,'datamodal_where'=>$consult];
			$columns[] = ['label'=>'Quantity','name'=>'quantity','type'=>'number','required'=>true];

			$this->form[] = ['label'=>'Combo','name'=>'product_kit_detail','type'=>'child','columns'=>$columns,'table'=>'product_kit_detail','foreign_key'=>'products_kit_id'];
//			$this->form[] = ['label'=>'Descuento en porcentaje','name'=>'discount_kit','type'=>'number','width'=>'col-sm-10','validation'=>'min:0|max:100'];

            if( CRUDBooster::getCurrentMethod() == "getAdd" ){
             $this->form[] = ['label'=>'Precio de venta comercial','name'=>'commercial_sale_price','type'=>'text','width'=>'col-sm-10','validation'=>'min:0|max:100'];
            }else{
             $this->form[] = ['label'=>'Precio de venta comercial','name'=>'commercial_sale_price','type'=>'money','width'=>'col-sm-10','validation'=>'min:0|max:100'];
            }
            $this->form[] = ['label'=>'Descripción','name'=>'description','type'=>'textarea','width'=>'col-sm-10'];
            $this->form[] = ['label'=>'Descripción pública','name'=>'public_description','type'=>'textarea','width'=>'col-sm-10'];
            if( CRUDBooster::isSuperadmin() ){
                $this->form[] = ['label'=>'Categoria','name'=>'categories_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'categories,name'];
                $this->form[] = ['label'=>'Marca','name'=>'brands_id','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'brands,name'];
            }else{
                $this->form[] = ['label'=>'Categoria','name'=>'categories_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'categories,name',"datatable_where"=>"stores_id = $store_id"];
                $this->form[] = ['label'=>'Marca','name'=>'brands_id','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','datatable'=>'brands,name',"datatable_where"=>"stores_id = $store_id"];
            }
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Picture","name"=>"picture","type"=>"upload","required"=>TRUE,"validation"=>"required|image|max:3000","help"=>"Tipo de imágenes soportados: JPG, JPEG, PNG, GIF, BMP"];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"Puedes introducir solo una letra"];
			//$this->form[] = ["label"=>"Price","name"=>"price","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Category Id","name"=>"category_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"category,name"];
			//$this->form[] = ["label"=>"Expiration Date","name"=>"expiration_date","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Description","name"=>"description","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Brands Id","name"=>"brands_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"brands,name"];
			//$this->form[] = ["label"=>"Sku","name"=>"sku","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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


			if( CRUDBooster::getCurrentMethod() == "getAdd" ){

                $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;
//                dd(StockRepo::getLastStock($store_id));
                //TODO IMPLEMET SELECT SEDE IN SUPER ADMIN
                if(! CRUDBooster::isSuperadmin() ) {
                    $stock = StockRepo::getLastStock($store_id);
                }else{
                    $stock = StockRepo::getLastStock($store_id ??1);
                }

				$this->script_js = "

                  let boxBody = document.getElementsByClassName('row')[0];

				  const formatter = new Intl.NumberFormat('en-US', {
                       style: 'currency',
                       currency: 'USD',
                       minimumFractionDigits: 0
                 });

                 // Texto para mostrar en la vista


                    createText(boxBody,'001p','');
                    createText(boxBody,'002p','');

                 // Texto para mostrar en la vista

                let stocks = ".json_encode($stock).";
				document.getElementById('panel-form-combo').style.display = 'none';
				let resultado;
				let selectElement = document.getElementById('type');
				let currentListProducts = [];

				let currentPriceTotal = 0;
				let currentPriceTotalNeto = 0;
				let currenTotalDiscount = 0;
				let commercial_sale_price = '0';



                 setInterval( validar, 1000);

               function validar(){

                 format();
                 cantidadActual = document.getElementById('table-combo')?.childNodes[3]?.childNodes;

                 currentListProducts = [];
                 cantidadActual.forEach(function (item){
                     if (item?.tagName == 'TR' && item.className != 'trNull' ) {
                        currentListProducts.push(
                          { 'product_id' : item.childNodes[0].childNodes[1].value , 'quantity' : item.childNodes[1].childNodes[0].data  },
                        );
                     }
                 });


                    currentPriceTotal = 0;
			    	currentPriceTotalNeto = 0;
			    	currenTotalDiscount = 0;
			    	commercial_sale_price = document.getElementById('commercial_sale_price').value.replace('$', '').replace(',', '').replace(/[^0-9]/g, '');

                    currentListProducts.forEach(
                    function(element){

                      let product = stocks.filter(stock => stock.id_product == element.product_id)[0];

                        currentPriceTotalNeto += product.price * element.quantity;

                    });



                    if(currentPriceTotalNeto!=0){
                     currenTotalDiscount = ((currentPriceTotalNeto - commercial_sale_price)/currentPriceTotalNeto)*100;
                    }


                      editText(boxBody,'001p','Precio total combo en el stock actual : '+  formatter.format(currentPriceTotalNeto) );
                      editText(boxBody,'002p','Descuento en funcion del precio digitado: '+ currenTotalDiscount +'%' );





               }

                function format(){
                      let value = document.getElementById('commercial_sale_price').value.replace('$', '').replace(',', '').replace(/[^0-9]/g, '');
                      console.log( document.getElementById('commercial_sale_price').value = formatter.format(value).toString().replace('$', ''));
                }

                function createText(ref,id,value){

                  element = document.createElement('p');
                  strong = document.createElement('strong');
                  element.innerHTML = value;
                  strong.setAttribute('id', id);
                  strong.appendChild(element);
                  ref.append(strong);

                }

                function editText(ref,id,value){


                  let child = document.getElementById(id);
                  child.remove();
                  element = document.createElement('p');
                  strong = document.createElement('strong');
                  element.innerHTML = value;
                  strong.setAttribute('id', id);
                  strong.appendChild(element);
                  ref.append(strong);

                }


				selectElement.addEventListener('change', (event) => {

					resultado = document.getElementById('type').value;

					if(resultado == 'KIT' ){

						resultado = document.getElementById('panel-form-combo').style.display = null;

						resultado = document.getElementById('form-group-brands_id').style.display = 'none';
						resultado = document.getElementById('form-group-expiration_date').style.display = 'none';

					}else{

						resultado = document.getElementById('panel-form-combo').style.display = 'none';

						resultado = document.getElementById('form-group-brands_id').style.display = null;
						resultado = document.getElementById('form-group-expiration_date').style.display = null;

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
            if (!CRUDBooster::isSuperadmin()) {
                $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;
                $query->where('products.stores_id',  $store_id);
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


	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {

            $this->updateStockMongo->updateStock(CmsUser::getStoresId());
            $this->updateStockMongo->updateCommersialsPages();

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



	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_edit($id) {

            $this->updateStockMongo->updateStock(CmsUser::getStoresId());
            $this->updateStockMongo->updateCommersialsPages();
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

            $this->updateStockMongo->updateStock(CmsUser::getStoresId());
            $this->updateStockMongo->updateCommersialsPages();
	    }



	    //By the way, you can still create your own method in here... :)


	}
