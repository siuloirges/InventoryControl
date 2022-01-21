<?php namespace App\Http\Controllers;

use App\Models\CmsUser;
use App\Models\Inventory;
use App\Repositories\stock\StockRepo;
use App\Repositories\stock\updateStockMongo\Contracts\UpdateStockMongoInterface;
use crocodicstudio\crudbooster\helpers\CRUDBooster as HelpersCRUDBooster;
use Session;
use Request;
use DB;
use CRUDBooster;


class AdminStocks1Controller extends \crocodicstudio\crudbooster\controllers\CBController
{

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
        $this->button_export = false;
        $this->table = "stocks";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE


        $this->col = [];
        $this->col[] = ["label" => "Producto", "name" => "products_id", "join" => "products,name"];

        $id_cms_privileges = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->select('id_cms_privileges')->first()->id_cms_privileges;

        if( $id_cms_privileges=="1"||$id_cms_privileges=="3" ) {
            $this->col[] = ["label" => "Costo", "name" => "cost", "callback_php" => 'number_format($row->cost)'];
        }
        $this->col[] = ["label" => "Precio producto", "name" => "price_products","callback_php"=>'number_format($row->price_products)'];
        $this->col[] = ["label" => "Proveedor", "name" => "suppliers_id", "join" => "suppliers,name"];
        $this->col[] = ["label" => "Cantidad", "name" => "stock"];
        $this->col[] = ["label" => "Entradas", "name" => "stock_in"];
        $this->col[] = ["label" => "Salidas", "name" => "stock_out"];
        $this->col[] = ["label" => "Description", "name" => "description"];
        $this->col[] = ["label" => 'Fecha', 'name' => 'created_at'];
        $this->col[] = ["label"=>"Sede","name"=>"stores_id",'type'=>'text',"join"=>'stores,name'];
        # END COLUMNS DO NOT REMOVE THIS LINE

        $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        if( CRUDBooster::isSuperadmin() ){
            $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'stores,name'];
        }else{
            $this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'readonly' => 'true', 'value' =>  $store_id];
        }
//        if( CRUDBooster::isSuperadmin() ){
//
//            $this->form[] = ['label' => 'Productos', 'name' => 'products_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'products,name',"datatable_where"=>"type = 'PRODUCT'"];
//
//        } else {
            $this->form[] = ['label' => 'Productos', 'name' => 'products_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'products,name',"datatable_where"=>"stores_id = $store_id and type = 'PRODUCT'",'datatable_format'=>"name,' - ',type"];
//        }

        $this->form[] = ['label' => 'Costo', 'name' => 'cost', 'type' => 'money', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10',"value"=>old("stores_id")];
        $this->form[] = ['label' => 'Precio producto', 'name' => 'price_products', 'type' => 'money', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Usuario', 'name' => 'cms_users_id', 'type' => 'hidden', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10', 'value' => HelpersCRUDBooster::myId()];

        if( CRUDBooster::isSuperadmin() ) {
            $this->form[] = ['label' => 'Proveedor', 'name' => 'suppliers_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'suppliers,name'];
        }else{
            $this->form[] = ['label' => 'Proveedor', 'name' => 'suppliers_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'suppliers,name',"datatable_where"=>"stores_id = $store_id"];
        }
        $this->form[] = ['label' => 'Cantidad', 'name' => 'stock', 'type' => 'number', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Entradas', 'name' => 'stock_in', 'type' => 'number', 'readonly' => true, 'validation' => 'integer|min:0', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Salidas', 'name' => 'stock_out', 'type' => 'number', 'readonly' => true, 'validation' => 'integer|min:0', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'validation' => 'min:1|max:255', 'width' => 'col-sm-10'];


        $columns = [];
        $columns[] = ['label' => 'IMEI', 'name' => 'imei', 'type' => 'text','help'=>'Si el producto no tiene imei digitar "0" ', 'validation' => 'unique:inventory.imei', 'required' => true];
        $columns[] = ['label' => 'Referencia', 'name' => 'reference', 'type' => 'textarea'];


        if(CRUDBooster::getCurrentMethod() == "getDetail" ) {

            $columns[] = ["label" => "Vendido", "name" => "is_sold", "callback" => function ($row) {
                if ($row->is_sold == 1) {
                    return 'Si';
                } else {
                    return 'No';
                }
            }];

             $columns[] = ['label' => 'Vendida', 'name' => 'updated_at', 'type' => 'text'];

        }

        //$columns[] = ['label' => 'Sede','readonly' => true,  'name' => 'stores_id', 'type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Sede','name'=>'stores_id','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10', 'readonly' => 'true', 'value' =>  $store_id];
        //$columns[] = ['label' => 'Vendido','readonly' => true,  'name' => 'is_sold', 'type' => 'checkbox'];

        $this->form[] = ['label' => 'Inventario', 'name' => 'order_detail','type' => 'child', 'columns' => $columns, 'table' => 'inventory', 'foreign_key' => 'stocks_id'];

        // $this->form = [];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Stores Id","name"=>"stores_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"stores,name"];
        //$this->form[] = ["label"=>"Products Id","name"=>"products_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"products,name"];
        //$this->form[] = ["label"=>"Cms Users Id","name"=>"cms_users_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"cms_users,name"];
        //$this->form[] = ["label"=>"Stock","name"=>"stock","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Stock In","name"=>"stock_in","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Stock Out","name"=>"stock_out","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
        //$this->form[] = ["label"=>"Description","name"=>"description","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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


        if(CRUDBooster::getCurrentMethod() == "getIndex" ){
            //TODO IMPLEMET SELECT SEDE IN SUPER ADMIN
            if(! CRUDBooster::isSuperadmin() ) {
              $stock = StockRepo::getLastStock($store_id);
            }else{
              $stock = StockRepo::getLastStock($store_id ??1);
            }

            foreach ( $stock as $key => $product_detail ){
                if($product_detail['type'] == 'PRODUCT'){
                  $this->index_statistic[] = ['label' => $product_detail['name'].': $'.  number_format( $product_detail['price'] ), 'count' =>$product_detail['quantity'] , 'icon' => $product_detail['quantity'] <= 5? 'fa fa-exclamation-triangle':'fa fa-info', 'color' => $product_detail['quantity'] <= $product_detail['minimum_ammount']?'red':'yellow', "link" => url("#")];
                }
            }
        }

        /*
        | ----------------------------------------------------------------------
        | Add javascript at body
        | ----------------------------------------------------------------------
        | javascript code in the variable
        | $this->script_js = "function() { ... }";
        |
        */

        // dd(CRUDBooster::getCurrentMethod());


        if(CRUDBooster::getCurrentMethod() == "getAdd" ){
            $this->script_js = "
                $(function () {


                    let cantidad = 0;
                    let cantidadActual = 0;
                    let is_delete = false;

                    //* ----- inicio validar
                    function validar() {

                        try {
                            if (is_delete) {

                                if (document.getElementById('table-inventario')?.childNodes[3]?.childNodes[0]?.className == 'trNull') {
                                    cantidadActual = document.getElementById('table-inventario').childNodes[3].childNodes.length - 1 ?? 0;
                                } else {
                                    cantidadActual = document.getElementById('table-inventario').childNodes[3].childNodes.length ?? 0;
                                }

                            } else {

                                if (document.getElementById('table-inventario')?.childNodes[3]?.childNodes[1]?.className == 'trNull') {
                                    cantidadActual = document.getElementById('table-inventario').childNodes[3].childNodes.length - 3 ?? 0;
                                } else {
                                    if (document.getElementById('table-inventario')?.childNodes[3]?.childNodes[0]?.className == 'trNull') {
                                        cantidadActual = document.getElementById('table-inventario').childNodes[3].childNodes.length - 1 ?? 0;
                                        is_delete = true;
                                        validar();
                                    } else {
                                        cantidadActual = document.getElementById('table-inventario').childNodes[3].childNodes.length - 2 ?? 0;
                                    }
                                }

                            }

                        } catch (err) {

                        }

                        let buttom1 = document.getElementsByClassName('btn btn-success')[0];
                        let buttom2 = document.getElementsByClassName('btn btn-success')[1];

                        if (cantidad != cantidadActual) {
                            buttom1.disabled = true;
                            buttom2.disabled = true;
                        } else {
                            buttom1.disabled = false;
                            buttom2.disabled = false;
                        }

                        child = $('#001p')[0].remove();
                        element = document.createElement('p');
                        element.innerHTML = 'Añadidos ' + cantidadActual + ' de ' + cantidad;
                        element.setAttribute('id', '001p');
                        document.getElementsByClassName('panel-heading')[3].append(element);
                    }
                    //* ----- fin validar

                    element = document.createElement('p');
                    element.innerHTML = 'Añadidos ' + cantidadActual + ' de ' + cantidad;
                    element.setAttribute('id', '001p');
                    document.getElementsByClassName('panel-heading')[3].append(element);

                    $('#stock').change(function () {
                        cantidad = parseInt($(this).val())
                        $('#stock_in').val(cantidad);
                        $('#stock_out').val(0);
                        validar();
                    });

                    $('#btn-add-table-inventario').click(function () {

                        validar();

                    });

                    $('#btn-add-table-inventario').on({
                        mouseenter: function () {
                          if(  parseInt(document.getElementById('inventarioimei').value) == 0 ){

                           document.getElementById('inventarioimei').value = '000000' + new Date().getTime() + Math.floor(Math.random() * 9) + Math.floor(Math.random() * 9) + Math.floor(Math.random() * 9) + Math.floor(Math.random() * 999);

                          }
                        },
                    })

                    $('#btn-reset-form-inventario').click(function () {

                    });

                    $('.box-footer').on({
                        mouseenter: function () {
                            validar();
                        },
                    })

                    $('.box-body').on({
                        mouseenter: function () {
                            validar();
                        }
                    })
                });

	        	";
        }




        if( CRUDBooster::getCurrentMethod() == "getEdit" ){

            $this->script_js = "

             $(function () {



              let cantidadActual = 0;
              let cantidad = document.getElementById('stock').value;
              let CantidadInicial = document.getElementById('stock').value;
              let initial_stock_in = parseInt(document.getElementById('stock_in').value);

              function validar() {

                try {
                  let array2 = document.getElementById('table-inventario').childNodes[3].childNodes;
                  let trs = [];
                  for (var i = 0; i < array2.length; i++) {
                    if (array2[i].childNodes.length > 0) {
                      trs.push(array2[i]);
                    }
                  }

                  cantidadActual = trs.length;

                  if (cantidad != cantidadActual) {
                    document.getElementsByClassName('btn btn-success')[0].disabled = true;
                  } else {
                    document.getElementsByClassName('btn btn-success')[0].disabled = false;
                  }
                } catch (err) {
                }

                let array2 = document.getElementById('table-inventario').childNodes[3].childNodes;
                let trs = [];
                for (var i = 0; i < array2.length; i++) {
                  if (array2[i].childNodes.length > 0) {
                    trs.push(array2[i]);
                  }
                }

                cantidadActual = trs.length;

                child = $('#001p')[0].remove();
                element = document.createElement('p');
                element.innerHTML = 'Añadidos ' + cantidadActual + ' de ' + cantidad;
                element.setAttribute('id', '001p');
                document.getElementsByClassName('panel-heading')[3].append(element);

              }// fin validar

              element = document.createElement('p');
              element.innerHTML = 'Añadidos ' + cantidadActual + ' de ' + cantidad;
              element.setAttribute('id', '001p');
              document.getElementsByClassName('panel-heading')[3].append(element);

              $('#stock').change(function () {
                cantidad = parseInt($(this).val())


                $('#stock_in').val(initial_stock_in + ( cantidad -  CantidadInicial) );
//                $('#stock_out').val(0);
                validar();
              });

              let array = document.getElementById('table-inventario').childNodes[3].childNodes;

              for (i = 1; i <= array.length; i++) {

                if (array[i - 1]?.nextElementSibling?.cells[2]?.childNodes[3]) {
                  array[i - 1].nextElementSibling.cells[2].childNodes[3].remove();
                }
              }

              $('#btn-add-table-inventario').click(function () {
                validar();

              });

               $('#btn-add-table-inventario').on({
                        mouseenter: function () {


                        if(  parseInt(document.getElementById('inventarioimei').value) == 0 ){

                           document.getElementById('inventarioimei').value = '00000' + new Date().getTime() + Math.floor(Math.random() * 999);

                          }
                        },
                    })

              $('.box-footer').on({
                mouseenter: function () {
                  validar();
                },
              })
              $('.box-body').on({
                mouseenter: function () {
                  validar();
                }
              })
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

        if (!CRUDBooster::isSuperadmin()) {
            $store_id = DB::table('cms_users')->where('id', '=',CRUDBooster::myId() )->first()->stores_id;
            $query->where('stocks.stores_id',  $store_id);
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

       $inventarioImei = request()['inventario-imei'];


       if(is_null($inventarioImei)){
	    	CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Añada por lo menos un registro en el inventario.", "warning");
	   }

		$uniqueArray = array_unique($inventarioImei);

		$cantidad = request()['stock'];


        if (sizeof($inventarioImei) != sizeof($uniqueArray)) {
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Los seriales no pueden ser duplicados", "warning");
        }

		if(sizeof($uniqueArray) != $cantidad ){
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "La cantidad de seriales agregados al inventario no puede ser direrente al la cantidad del stock", "warning");
		}

        $inventory = Inventory::whereIn("imei", $inventarioImei)->get('imei');

        if ($inventory!="[]") {
            $data = null;
            foreach ($inventory as $item) {

                $data .= "<li><Strong>" . $item->imei . "</Strong></li>";
            }
            CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Los siguientes seriales ya existen en la base de datos: <ul> $data </ul> nota: no pueden estar duplicados",  "warning");
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
    public function hook_before_edit(&$postdata, $id)
    {


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
        $this->updateStockMongo->updateStock(CmsUser::getStoresId());
        $this->updateStockMongo->updateCommersialsPages();

    }

    // public  function  getAdd () {
    //     // Crea una autenticación
    // //    if (! CRUDBooster :: isCreate () && $ this -> global_privilege == FALSE || $ this -> button_add == FALSE ) {
    // //       CRUDBooster :: redirect ( CRUDBooster :: adminPath (), trans ( "crudbooster.denied_access" ));
    // //    }

    // //    $ datos = [];
    // //    $ data [ 'page_title' ] = 'Agregar datos' ;

    //    // Por favor use el método de vista en lugar de ver el método de laravel
    //    return  $this -> view ( 'Stock/AddStock' ,[] );
    //  }



    //By the way, you can still create your own method in here... :)


}


