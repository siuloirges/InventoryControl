<?php

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\Inventory;
use App\Models\Products;
use App\Models\Stock;
use App\Models\Stores;
use App\Models\Suppliers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Please wait updating the data...');

        $this->call('Cms_usersSeeder');
        $this->call('Cms_modulsSeeder');
        $this->call('Cms_privilegesSeeder');
        $this->call('Cms_privileges_rolesSeeder');
        $this->call('Cms_settingsSeeder');
        $this->call('CmsEmailTemplates');
        $this->call('Modulos');

        $this->command->info('Run factorys!');
        Products::factory()->count(3)->create();
        $this->command->info('Factorys Products Completed!');
        Stores::factory()->count(1)->create();
        $this->command->info('Factorys Stores Completed!');
        Stock::factory()->count(1)->create();
        $this->command->info('Factorys Stock Completed!');
        Inventory::factory()->count(20)->create();
        $this->command->info('Factorys Inventory Completed!');
        Categories::factory()->count(20)->create();
        $this->command->info('Factorys Categories Completed!');
        Customers::factory()->count(20)->create();
        $this->command->info('Factorys Customers Completed!');
        Suppliers::factory()->count(20)->create();
        $this->command->info('Factorys Suppliers Completed!');
        Brands::factory()->count(20)->create();
        $this->command->info('Factorys Brands Completed!');
        // Order::factory()->count(20)->create();
        $this->command->info('Factorys Order Completed!');
        // OrdersDetail::factory()->count(20)->create();
        $this->command->info('Factorys OrdersDetail Completed!');
        $this->command->info('end factorys!');

        $this->command->info('Updating the data completed !');
    }
}

class Modulos extends Seeder {
    public function run() {
        $this->command->info('Please wait updating the data...');
        # cms_menus
       $data = [
           [
               "id"=>"1",
               "name"=>"Productos",
               "type"=>"Route",
               "path"=>"AdminProducts1ControllerGetIndex",
               "icon"=>"fa fa-cubes",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"2",
           ],
           [
               "id"=>"2",
               "name"=>"Tiendas",
               "type"=>"Route",
               "path"=>"AdminStoresControllerGetIndex",
               "icon"=>"fa fa-shopping-bag",
               "parent_id"=>"22",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"5",
           ],
           [
               "id"=>"3",
               "name"=>"Stock",
               "type"=>"Route",
               "path"=>"AdminStocks1ControllerGetIndex",
               "icon"=>"fa fa-inbox",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"4",
           ],
           [
               "id"=>"4",
               "name"=>"Inventario",
               "type"=>"Route",
               "path"=>"AdminInventoryControllerGetIndex",
               "icon"=>"fa fa-list-alt",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"5",
           ],
           [
               "id"=>"5",
               "name"=>"Categorias",
               "type"=>"Route",
               "path"=>"AdminCategories1ControllerGetIndex",
               "icon"=>"fa fa-th-large",
               "parent_id"=>"22",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"4",
           ],
           [
               "id"=>"6",
               "name"=>"Clientes",
               "type"=>"Route",
               "path"=>"AdminCustomers1ControllerGetIndex",
               "icon"=>"fa fa-group",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"7",
           ],
           [
               "id"=>"7",
               "name"=>"Proveedores",
               "type"=>"Route",
               "path"=>"AdminSuppliers1ControllerGetIndex",
               "icon"=>"fa fa-tag text-normal",
               "parent_id"=>"22",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"3",
           ],
           [
               "id"=>"8",
               "name"=>"Marcas",
               "type"=>"Route",
               "path"=>"AdminBrands1ControllerGetIndex",
               "icon"=>"fa fa-star-o text-normal",
               "parent_id"=>"22",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"2",
           ],
           [
               "id"=>"9",
               "name"=>"Ordenes",
               "type"=>"Route",
               "path"=>"AdminOrdersControllerGetIndex",
               "icon"=>"fa fa-shopping-bag",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"10",
           ],
           [
               "id"=>"10",
               "name"=>"Configuracion",
               "type"=>"URL",
               "path"=>"#",
               "icon"=>"fa fa-cogs",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"16",
           ],
           [
               "id"=>"11",
               "name"=>"Tipos de prospecto",
               "type"=>"Route",
               "path"=>"AdminTypeProspectosControllerGetIndex",
               "icon"=>"fa fa-wrench",
               "parent_id"=>"10",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"1",
           ],
           [
               "id"=>"12",
               "name"=>"Tipos de documentos",
               "type"=>"Route",
               "path"=>"AdminTypeDocumentsControllerGetIndex",
               "icon"=>"fa fa-wrench",
               "parent_id"=>"10",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"2",
           ],
           [
               "id"=>"13",
               "name"=>"Prospectos",
               "type"=>"Route",
               "path"=>"AdminProspectoControllerGetIndex",
               "icon"=>"fa fa-server",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"1",
           ],
           [
               "id"=>"14",
               "name"=>"Agentes de envios",
               "type"=>"Route",
               "path"=>"AdminShippingAgentsControllerGetIndex",
               "icon"=>"fa fa-truck",
               "parent_id"=>"10",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"3",
           ],
           [
               "id"=>"15",
               "name"=>"Turnero",
               "type"=>"URL",
               "path"=>"Turnero",
               "icon"=>"fa fa-ticket",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"12",
           ],
           [
               "id"=>"16",
               "name"=>"Documentos",
               "type"=>"Route",
               "path"=>"AdminOrderFilesDetailControllerGetIndex",
               "icon"=>"fa fa-print",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"11",
           ],
           [
               "id"=>"17",
               "name"=>"Reportes de pagos",
               "type"=>"Route",
               "path"=>"AdminPaymentReports1ControllerGetIndex",
               "icon"=>"fa fa-money",
               "parent_id"=>"19",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"2",
           ],
           [
               "id"=>"18",
               "name"=>"Mi cartera",
               "type"=>"URL",
               "path"=>"Wallet",
               "icon"=>"fa fa-credit-card-alt",
               "parent_id"=>"19",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"1",
           ],
           [
               "id"=>"19",
               "name"=>"Pagos",
               "type"=>"URL",
               "path"=>"#",
               "icon"=>"fa fa-usd",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"14",
           ],
           [
               "id"=>"20",
               "name"=>"Recursos",
               "type"=>"URL",
               "path"=>"#",
               "icon"=>"fa fa-inbox",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"13"
           ],
           [
               "id"=>"21",
               "name"=>"Recursos",
               "type"=>"Route",
               "path"=>"AdminRecursosControllerGetIndex",
               "icon"=>"fa fa-inbox",
               "parent_id"=>"20",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"3"
           ],
           [
               "id"=>"22",
               "name"=>"Acerca de Tiendas",
               "type"=>"URL",
               "path"=>"#",
               "icon"=>"fa fa-shopping-bag",
               "parent_id"=>"0",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"15"
           ],
           [
               "id"=>"23",
               "name"=>"Informacion",
               "type"=>"URL",
               "path"=>"Informacion",
               "icon"=>"fa fa-info-circle",
               "parent_id"=>"20",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"1"
           ],
           [
               "id"=>"24",
               "name"=>"Preguntas",
               "type"=>"URL",
               "path"=>"Preguntas",
               "icon"=>"fa fa-question",
               "parent_id"=>"20",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"2"
           ],
           [
               "id"=>"25",
               "name"=>"Pasarelas de pago",
               "type"=>"Route",
               "path"=>"AdminPaymentGatewayAgentControllerGetIndex",
               "icon"=>"fa fa-puzzle-piece",
               "parent_id"=>"10",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"4",
           ],
           [
               "id"=>"26",
               "name"=>"Ordenes Reservadas",
               "type"=>"Route",
               "path"=>"AdminReservedOrdersControllerGetIndex",
               "icon"=>"fa fa-shopping-cart",
               "parent_id"=>"22",
               "is_active"=>"1",
               "is_dashboard"=>"0",
               "id_cms_privileges"=>"1",
               "sorting"=>"1",
           ],

           //menus

       ];

        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('cms_menus')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }
        \Illuminate\Support\Facades\DB::table('cms_menus')->insert($data);

        $this->command->info("Create cms_menus completed");
        # cms_menus End


        //----------------------------------------------------------//
        # cms_menus_privileges
        $data = [
            [
                "id_cms_menus"=>"1",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"2",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"3",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"4",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"5",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"6",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"7",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"8",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"9",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"10",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"11",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"12",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"13",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"14",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"15",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"16",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"17",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"18",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"19",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"20",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"21",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"22",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"23",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"24",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"25",
                "id_cms_privileges"=>"1"
            ],
            [
                "id_cms_menus"=>"26",
                "id_cms_privileges"=>"1"
            ]
        ];
        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('cms_menus_privileges')->where('id_cms_menus', $d['id_cms_menus'])->count()) {
                unset($data[$k]);
            }
        }

        \Illuminate\Support\Facades\DB::table('cms_menus_privileges')->insert($data);

        $this->command->info("Create cms_menus_privileges completed");
        # cms_menus_privileges End

        //----------------------------------------------------------//


        # cms_moduls
        $data = [

            [
                "id"=>"12",
                "name"=>"Productos",
                "icon"=>"fa fa-cubes",
                "path"=>"products",
                "table_name"=>"products",
                "controller"=>"AdminProducts1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"13",
                "name"=>"Tienda",
                "icon"=>"fa fa-cubes",
                "path"=>"stores",
                "table_name"=>"stores",
                "controller"=>"AdminStoresController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"14",
                "name"=>"Stock",
                "icon"=>"fa fa-inbox",
                "path"=>"stocks",
                "table_name"=>"stocks",
                "controller"=>"AdminStocks1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"15",
                "name"=>"Inventario",
                "icon"=>"fa fa-list-alt",
                "path"=>"inventory",
                "table_name"=>"inventory",
                "controller"=>"AdminInventoryController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"16",
                "name"=>"Categorias",
                "icon"=>"fa fa-th-large",
                "path"=>"categories",
                "table_name"=>"categories",
                "controller"=>"AdminCategories1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"17",
                "name"=>"Clientes",
                "icon"=>"fa fa-group text-normal",
                "path"=>"customers",
                "table_name"=>"customers",
                "controller"=>"AdminCustomers1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"18",
                "name"=>"Proveedores",
                "icon"=>"fa fa-tag text-normal",
                "path"=>"suppliers",
                "table_name"=>"suppliers",
                "controller"=>"AdminSuppliers1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"19",
                "name"=>"Marcas",
                "icon"=>"fa fa-tag text-normal",
                "path"=>"brands",
                "table_name"=>"brands",
                "controller"=>"AdminBrands1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"20",
                "name"=>"Ordenes",
                "icon"=>"fa fa-shopping-bag",
                "path"=>"orders",
                "table_name"=>"orders",
                "controller"=>"AdminOrdersController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"21",
                "name"=>"Tipos de Prospecto",
                "icon"=>"fa fa-wrench",
                "path"=>"type_prospectos",
                "table_name"=>"type_prospectos",
                "controller"=>"AdminTypeProspectosController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"22",
                "name"=>"Tipos de documentos",
                "icon"=>"fa fa-wrench",
                "path"=>"type_documents",
                "table_name"=>"type_documents",
                "controller"=>"AdminTypeDocumentsController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"23",
                "name"=>"Prospectos",
                "icon"=>"fa fa-server",
                "path"=>"prospecto",
                "table_name"=>"prospecto",
                "controller"=>"AdminProspectoController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"24",
                "name"=>"Agentes de envios",
                "icon"=>"fa fa-truck",
                "path"=>"shipping_agents",
                "table_name"=>"shipping_agents",
                "controller"=>"AdminShippingAgentsController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"25",
                "name"=>"Documentos",
                "icon"=>"fa fa-print",
                "path"=>"order_files_detail",
                "table_name"=>"order_files_detail",
                "controller"=>"AdminOrderFilesDetailController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"26",
                "name"=>"Reportes de pagos",
                "icon"=>"fa fa-money",
                "path"=>"payment_reports",
                "table_name"=>"payment_reports",
                "controller"=>"AdminPaymentReports1Controller",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"27",
                "name"=>"Recursos",
                "icon"=>"fa fa-inbox",
                "path"=>"recursos",
                "table_name"=>"recursos",
                "controller"=>"AdminRecursosController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"28",
                "name"=>"Pasarelas de pago",
                "icon"=>"fa fa-puzzle-piece",
                "path"=>"payment_gateway_agent",
                "table_name"=>"payment_gateway_agent",
                "controller"=>"AdminPaymentGatewayAgentController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],
            [
                "id"=>"29",
                "name"=>"Ordenes Reservadas",
                "icon"=>"fa fa-shopping-cart",
                "path"=>"Reserved Orders",
                "table_name"=>"orders",
                "controller"=>"AdminReservedOrdersController",
                "is_protected"=>"0",
                "is_active"=>"0"
            ],

        ];

        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('cms_moduls')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }
        \Illuminate\Support\Facades\DB::table('cms_moduls')->insert($data);

        $this->command->info("Create cms_moduls completed");
        # cms_moduls End

        //---------------------------------------------------------------------------------//

        # cms_privileges_roles
        $data = [

            //Asesor Comercial cms_privileges_roles
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2",//Asesor Comercial
                "id_cms_moduls"=>"17"    //Clientes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2",//Asesor Comercial
                "id_cms_moduls"=>"15"    //Inventario
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2",//Asesor Comercial
                "id_cms_moduls"=>"20"    //Ordenes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2",//Asesor Comercial
                "id_cms_moduls"=>"12"    //Productos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2", //Asesor Comercial
                "id_cms_moduls"=>"14"     //Stock
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2", //Asesor Comercial
                "id_cms_moduls"=>"23"     //Prospectos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2", //Asesor Comercial
                "id_cms_moduls"=>"25"     //Documentos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"2", //Asesor Comercial
                "id_cms_moduls"=>"26"     //Reportes de pagos
            ],



            //Operador Bodega cms_privileges_roles
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"1",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"16"     //Categorias
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"17"     //Clientes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"15"     //Inventario
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3",//Operador Bodega
                "id_cms_moduls"=>"19"     //Marcas
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"20"     //Ordenes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"1",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"12"     //Productos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"18"     //Proveedores
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"14"     //Stock
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"23"     //Prospectos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"25"     //Documentos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"26"     //Reportes de pagos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"3", //Operador Bodega
                "id_cms_moduls"=>"29"     //Ordenes Reservada
            ],


            //Administrador de Tienda cms_privileges_roles
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"1",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"16"     //Categorias
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"17"     //Clientes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"15"     //Inventario
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"19"     //Marcas
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"20"     //Ordenes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"12"     //Productos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"23"     //Prospectos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"18"     //Proveedores
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"14"     //Stock
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"26"     //Reportes de pagos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"1",
                "id_cms_privileges"=>"4", //Administrador de Tienda
                "id_cms_moduls"=>"27" //Recursos
             ],
             [
                 "is_visible"=>"1",
                 "is_create"=>"1",
                 "is_read"=>"1",
                 "is_edit"=>"1",
                 "is_delete"=>"0",
                 "id_cms_privileges"=>"4", //Administrador de Tienda
                 "id_cms_moduls"=>"28" //Pasarelas de pago
              ],
              [
                  "is_visible"=>"1",
                  "is_create"=>"0",
                  "is_read"=>"1",
                  "is_edit"=>"1",
                  "is_delete"=>"0",
                  "id_cms_privileges"=>"4", //Administrador de Tienda
                  "id_cms_moduls"=>"29"     //Ordenes Reservada
              ],


            //Coordinador cms_privileges_roles
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"16"     //Categorias
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"17"     //Clientes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"15"     //Inventario
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"20"     //Ordenes
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"12"     //Productos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"23"     //Prospectos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"0",
                "is_read"=>"1",
                "is_edit"=>"0",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"14"     //Stock
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Asesor Comercial
                "id_cms_moduls"=>"25" //Documentos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"0",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"26" //Reportes de pagos
            ],
            [
                "is_visible"=>"1",
                "is_create"=>"1",
                "is_read"=>"1",
                "is_edit"=>"1",
                "is_delete"=>"1",
                "id_cms_privileges"=>"5", //Coordinador
                "id_cms_moduls"=>"27" //Recursos
            ],

        ];

        // foreach ($data as $k => $d) {

        //     if (\Illuminate\Support\Facades\DB::table('cms_privileges_roles')->where('name', $d['name'])->count()) {
        //         unset($data[$k]);
        //     }
        // }
        \Illuminate\Support\Facades\DB::table('cms_privileges_roles')->insert($data);

        $this->command->info("Create cms_privileges_roles completed");
        # cms_moduls End




        //----------------------------------------------------------//


        # cms_menus_privileges
        $data = [


            //Productos
            [
                "id_cms_menus"=>"1",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"1",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"1",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"1",
                "id_cms_privileges"=>"5" //Coordinador
            ],


            //Stock
            [
                "id_cms_menus"=>"3",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"3",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"3",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"3",
                "id_cms_privileges"=>"5" //Coordinador
            ],


            //Inventario
            [
                "id_cms_menus"=>"4",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"4",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"4",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"4",
                "id_cms_privileges"=>"5" //Coordinador
            ],


            //Categorias
            [
                "id_cms_menus"=>"5",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"5",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"5",
                "id_cms_privileges"=>"5" //Coordinador
            ],



            //Clientes
            [
                "id_cms_menus"=>"6",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"6",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"6",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"6",
                "id_cms_privileges"=>"5" //Coordinador
            ],


            //Proveedores
            [
                "id_cms_menus"=>"7",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"7",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"7",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],



            //Marcas
            [
                "id_cms_menus"=>"8",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"8",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],


            //Ordenes
            [
                "id_cms_menus"=>"9",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"9",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"9",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"9",
                "id_cms_privileges"=>"5" //Coordinador
            ],

            //prospectos
            [
                "id_cms_menus"=>"13",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"13",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"13",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"13",
                "id_cms_privileges"=>"5" //Coordinador
            ],

            //Documentos
            [
                "id_cms_menus"=>"16",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"16",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],
            [
                "id_cms_menus"=>"16",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"16",
                "id_cms_privileges"=>"5" //Coordinador
            ],

            //Reportes de pagos
            [
                "id_cms_menus"=>"17",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"17",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"17",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"17",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //Mis pagos
            [
                "id_cms_menus"=>"18",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"18",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"18",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //Pagos
            [
                "id_cms_menus"=>"19",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"19",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"19",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"19",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //Acerca de Tienda
            [
                "id_cms_menus"=>"22",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"22",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"22",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //Recursos
            [
                "id_cms_menus"=>"20",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"20",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"20",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"20",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //Sub menu Recursos
            [
                "id_cms_menus"=>"21",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"21",
                "id_cms_privileges"=>"5" //Coordinador
            ],

            //Sub menu Informacion
            [
                "id_cms_menus"=>"23",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"23",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"23",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"23",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //Sub menu Preguntas
            [
                "id_cms_menus"=>"24",
                "id_cms_privileges"=>"2" //Asesor Comercial
            ],
            [
                "id_cms_menus"=>"24",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"24",
                "id_cms_privileges"=>"5" //Coordinador
            ],
            [
                "id_cms_menus"=>"24",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

            //payment_gateway_agent
            [
                "id_cms_menus"=>"25",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],

            //Ordenes Reservada
            [
                "id_cms_menus"=>"26",
                "id_cms_privileges"=>"4" //Administrador de Tienda
            ],
            [
                "id_cms_menus"=>"26",
                "id_cms_privileges"=>"3" //Operador Bodega
            ],

        ];

        // foreach ($data as $k => $d) {

        //     if (\Illuminate\Support\Facades\DB::table('cms_menus_privileges')->where('name', $d['name'])->count()) {
        //         unset($data[$k]);
        //     }
        // }
        \Illuminate\Support\Facades\DB::table('cms_menus_privileges')->insert($data);

        $this->command->info("Create cms_menus_privileges completed");
        # cms_moduls End


        //----------------------------------------------------------//


        # cms_privileges
        $data = [

            [
                "id"=>"2",
                "name"=>"Asesor Comercial",
                "is_superadmin"=>"0",
                "theme_color"=>"skin-blue",
            ],
            [
                "id"=>"3",
                "name"=>"Operador Bodega",
                "is_superadmin"=>"0",
                "theme_color"=>"skin-blue",
            ],
            [
                "id"=>"4",
                "name"=>"Administrador de Tienda",
                "is_superadmin"=>"0",
                "theme_color"=>"skin-blue",
            ],
            [
                "id"=>"5",
                "name"=>"Coordinador",
                "is_superadmin"=>"0",
                "theme_color"=>"skin-blue",
            ]

        ];

        // foreach ($data as $k => $d) {

        //     if (\Illuminate\Support\Facades\DB::table('cms_privileges')->where('name', $d['name'])->count()) {
        //         unset($data[$k]);
        //     }
        // }
        \Illuminate\Support\Facades\DB::table('cms_privileges')->insert($data);

        $this->command->info("Create cms_privileges completed");
        # cms_moduls End


        //----------------------------------------------------------//


        # cms_users
        $data = [
            [
                "name"=>"SergioAsesor",
                "photo"=>"https://media.boitas.com/wp-content/uploads/2021/07/abarrotes-movil-2.png",
                "email"=>"Asesor@crudbooster.com",
                "password"=>'$2y$10$qHT70k5XabiGcNCUzjPhDe.wE9wt6rx8O0ksn5w87kgbDg3mfRwu6',
                "id_cms_privileges"=>"2", //Asesor Comercial
                'stores_id'=>"1",
                "status"=>"Active",
            ],
            [
                "name"=>"SergioBodega",
                "photo"=>"https://media.boitas.com/wp-content/uploads/2021/07/abarrotes-movil-2.png",
                "email"=>"Operador@crudbooster.com",
                "password"=>'$2y$10$qHT70k5XabiGcNCUzjPhDe.wE9wt6rx8O0ksn5w87kgbDg3mfRwu6',
                "id_cms_privileges"=>"3", //Operador Bodega
                'stores_id'=>"1",
                "status"=>"Active",
            ],
            [
                "name"=>"SergioTienda",
                "photo"=>"https://media.boitas.com/wp-content/uploads/2021/07/abarrotes-movil-2.png",
                "email"=>"Tienda@crudbooster.com",
                "password"=>'$2y$10$qHT70k5XabiGcNCUzjPhDe.wE9wt6rx8O0ksn5w87kgbDg3mfRwu6',
                "id_cms_privileges"=>"4",//Administrador de Tienda
                'stores_id'=>"1",
                "status"=>"Active",
            ],
            [
                "name"=>"SergioCoordinador",
                "photo"=>"https://media.boitas.com/wp-content/uploads/2021/07/abarrotes-movil-2.png",
                "email"=>"Coordinador@crudbooster.com",
                "password"=>'$2y$10$qHT70k5XabiGcNCUzjPhDe.wE9wt6rx8O0ksn5w87kgbDg3mfRwu6',
                "id_cms_privileges"=>"5",//Coordinador
                'stores_id'=>"1",
                "status"=>"Active",
            ],
        ];
        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('cms_users')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        \Illuminate\Support\Facades\DB::table('cms_users')->insert($data);

        $this->command->info("Create cms_users completed");
        # cms_users End



        //----------------------------------------------------------//


        #type_prospectos
        $data = [
            [
                "name"=>"WOM",
            ],
            [
                "name"=>"SPIRNET",
            ],
            [
                "name"=>"HUGHESNET"
            ],
            [
                "name"=>"AMPLIMAX"
            ]
        ];
        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('type_prospectos')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        \Illuminate\Support\Facades\DB::table('type_prospectos')->insert($data);

        $this->command->info("Create type_prospectos completed");
        # type_prospectos End

        //----------------------------------------------------------//


        #type_documents
        $data = [
            [
                "name"=>"CEDULA"
            ]
        ];
        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('type_documents')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        \Illuminate\Support\Facades\DB::table('type_documents')->insert($data);

        $this->command->info("Create type_documents completed");
        # type_documents End

        //----------------------------------------------------------//

        #shipping_agents
        $data = [
            [
                "name"=>"ENVIA"
            ],
            [
                "name"=>"SERVIENTREGA"
            ],
        ];

        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('shipping_agents')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        \Illuminate\Support\Facades\DB::table('shipping_agents')->insert($data);

        $this->command->info("Create shipping_agents completed");
        # shipping_agents End

        //----------------------------------------------------------//

        #stores
        $data = [
            [
                'identification_number'=>"001",
                'name'=>"JASOCOM",
                'adress'=>'Turbaco',
                'phone_number'=>'',

            ]
        ];
        foreach ($data as $k => $d) {
            if (\Illuminate\Support\Facades\DB::table('stores')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        \Illuminate\Support\Facades\DB::table('stores')->insert($data);

        $this->command->info("Create stores completed");
        # stores End


        //----------------------------------------------------------//

        #cms_settings
        $data = [
            [
                'created_at'=>date('Y-m-d H:i:s'),
                'name'=>'turnero_estado',
                'content'=>1
            ],
            [
                'created_at'=>date('Y-m-d H:i:s'),
                'name'=>'turnero_modo',
                'content'=>'lineal'
            ],
            [
                'created_at'=>date('Y-m-d H:i:s'),
                'name'=>'iva',
                'content'=>'0.19'
            ]
        ];
        foreach ($data as $k => $d) {

            if (\Illuminate\Support\Facades\DB::table('cms_settings')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }

        }

        \Illuminate\Support\Facades\DB::table('cms_settings')->insert($data);

        $this->command->info("Create cms_settings completed");
        # cms_settings End





    }
}
class CmsEmailTemplates extends Seeder {
    public function run() {
        DB::table('cms_email_templates')
        ->insert([
            'id'          =>DB::table('cms_email_templates')->max('id')+1,
            'created_at'  =>date('Y-m-d H:i:s'),
            'name'        =>'Email Template Forgot Password Backend',
            'slug'        =>'forgot_password_backend',
            'content'     =>'<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>',
            'description' =>'[password]',
            'from_name'   =>'System',
            'from_email'  =>'system@crudbooster.com',
            'cc_email'    =>NULL
            ]);
    }
}

class Cms_settingsSeeder extends Seeder {

    public function run()
    {

       $data = [

        //LOGIN REGISTER STYLE
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'login_background_color',
            'label'=>'Login Background Color',
            'content'=>NULL,
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.login_register_style'),
            'dataenum'=>NULL,
            'helper'=>'Input hexacode'],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'login_font_color',
            'label'=>'Login Font Color',
            'content'=>NULL,
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.login_register_style'),
            'dataenum'=>NULL,
            'helper'=>'Input hexacode'],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'login_background_image',
            'label'=>'Login Background Image',
            'content'=>NULL,
            'content_input_type'=>'upload_image',
            'group_setting'=>trans('crudbooster.login_register_style'),
            'dataenum'=>NULL,
            'helper'=>NULL],


        //EMAIL SETTING
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'email_sender',
            'label'=>'Email Sender',
            'content'=>'support@crudbooster.com',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.email_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'smtp_driver',
            'label'=>'Mail Driver',
            'content'=>'mail',
            'content_input_type'=>'select',
            'group_setting'=>trans('crudbooster.email_setting'),
            'dataenum'=>'smtp,mail,sendmail',
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'smtp_host',
            'label'=>'SMTP Host',
            'content'=>'',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.email_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'smtp_port',
            'label'=>'SMTP Port',
            'content'=>'25',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.email_setting'),
            'dataenum'=>NULL,
            'helper'=>'default 25'],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'smtp_username',
            'label'=>'SMTP Username',
            'content'=>'',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.email_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'smtp_password',
            'label'=>'SMTP Password',
            'content'=>'',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.email_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL],


        //APPLICATION SETTING
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'appname',
            'label'=>'Application Name',
            'group_setting'=>trans('crudbooster.application_setting'),
            'content'=>'CRUDBooster',
            'content_input_type'=>'text',
            'dataenum'=>NULL,
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'default_paper_size',
            'label'=>'Default Paper Print Size',
            'group_setting'=>trans('crudbooster.application_setting'),
            'content'=>'Legal',
            'content_input_type'=>'text',
            'dataenum'=>NULL,
            'helper'=>'Paper size, ex : A4, Legal, etc'],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'logo',
            'label'=>'Logo',
            'content'=>'',
            'content_input_type'=>'upload_image',
            'group_setting'=>trans('crudbooster.application_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'favicon',
            'label'=>'Favicon',
            'content'=>'',
            'content_input_type'=>'upload_image',
            'group_setting'=>trans('crudbooster.application_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'api_debug_mode',
            'label'=>'API Debug Mode',
            'content'=>'true',
            'content_input_type'=>'select',
            'group_setting'=>trans('crudbooster.application_setting'),
            'dataenum'=>'true,false',
            'helper'=>NULL],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'google_api_key',
            'label'=>'Google API Key',
            'content'=>'',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.application_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL
        ],
        [
            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'google_fcm_key',
            'label'=>'Google FCM Key',
            'content'=>'',
            'content_input_type'=>'text',
            'group_setting'=>trans('crudbooster.application_setting'),
            'dataenum'=>NULL,
            'helper'=>NULL
        ]

        ];

        foreach($data as $row) {
            $count = DB::table('cms_settings')->where('name',$row['name'])->count();
            if($count) {
                if($count > 1) {
                    $newsId = DB::table('cms_settings')->where('name',$row['name'])->orderby('id','asc')->take(1)->first();
                    DB::table('cms_settings')->where('name',$row['name'])->where('id','!=',$newsId->id)->delete();
                }
                continue;
            }
            $row['id'] = DB::table('cms_settings')->max('id') + 1;
            DB::table('cms_settings')->insert($row);
        }

    }
}



class Cms_privileges_rolesSeeder extends Seeder {

    public function run()
    {

        if(DB::table('cms_privileges_roles')->count() == 0) {
            $modules = DB::table('cms_moduls')->get();
            $i = 1;
            foreach($modules as $module) {

                $is_visible = 1;
                $is_create  = 1;
                $is_read    = 1;
                $is_edit    = 1;
                $is_delete  = 1;

                switch($module->table_name) {
                    case 'cms_logs':
                        $is_create = 0;
                        $is_edit   = 0;
                    break;
                    case 'cms_privileges_roles':
                        $is_visible = 0;
                    break;
                    case 'cms_apicustom':
                        $is_visible = 0;
                    break;
                    case 'cms_notifications':
                        $is_create = $is_read = $is_edit = $is_delete = 0;
                    break;
                }

                DB::table('cms_privileges_roles')->insert([
                    'id'=>DB::table('cms_privileges_roles')->max('id')+1,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'is_visible'=>$is_visible,
                    'is_create'=>$is_create,
                    'is_edit'=>$is_edit,
                    'is_delete'=>$is_delete,
                    'is_read'=>$is_read,
                    'id_cms_privileges'=>1,
                    'id_cms_moduls'=>$module->id
                    ]);
                $i++;
            }
        }

    }
}

class Cms_privilegesSeeder extends Seeder {

    public function run()
    {

        if(DB::table('cms_privileges')->where('name','Super Administrator')->count() == 0) {
            DB::table('cms_privileges')->insert([
            'id'            =>DB::table('cms_privileges_roles')->max('id')+1,
            'created_at'    =>date('Y-m-d H:i:s'),
            'name'          =>'Super Administrator',
            'is_superadmin' =>1,
            'theme_color'   =>'skin-blue'
            ]);
        }
    }
}

class Cms_modulsSeeder extends Seeder {

    public function run()
    {

        /*
            1 = Public
            2 = Setting
        */

        $data = [
        [

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Notifications',
            'icon'=>'fa fa-cog',
            'path'=>'notifications',
            'table_name'=>'cms_notifications',
            'controller'=>'NotificationsController',
            'is_protected'=>1,
            'is_active'=>1
        ],
        [

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Privileges',
            'icon'=>'fa fa-cog',
            'path'=>'privileges',
            'table_name'=>'cms_privileges',
            'controller'=>'PrivilegesController',
            'is_protected'=>1,
            'is_active'=>1
        ],
        [

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Privileges Roles',
            'icon'=>'fa fa-cog',
            'path'=>'privileges_roles',
            'table_name'=>'cms_privileges_roles',
            'controller'=>'PrivilegesRolesController',
            'is_protected'=>1,
            'is_active'=>1
        ],
        [

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Users',
            'icon'=>'fa fa-users',
            'path'=>'users',
            'table_name'=>'cms_users',
            'controller'=>'AdminCmsUsersController',
            'is_protected'=>0,
            'is_active'=>1
        ],
        [

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Settings',
            'icon'=>'fa fa-cog',
            'path'=>'settings',
            'table_name'=>'cms_settings',
            'controller'=>'SettingsController',
            'is_protected'=>1,
            'is_active'=>1
        ],[

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Module Generator',
            'icon'=>'fa fa-database',
            'path'=>'module_generator',
            'table_name'=>'cms_moduls',
            'controller'=>'ModulsController',
            'is_protected'=>1,
            'is_active'=>1
        ],[

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Menu Management',
            'icon'=>'fa fa-bars',
            'path'=>'menu_management',
            'table_name'=>'cms_menus',
            'controller'=>'MenusController',
            'is_protected'=>1,
            'is_active'=>1
        ],[

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Email Template',
            'icon'=>'fa fa-envelope-o',
            'path'=>'email_templates',
            'table_name'=>'cms_email_templates',
            'controller'=>'EmailTemplatesController',
            'is_protected'=>1,
            'is_active'=>1
        ],[

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Statistic Builder',
            'icon'=>'fa fa-dashboard',
            'path'=>'statistic_builder',
            'table_name'=>'cms_statistics',
            'controller'=>'StatisticBuilderController',
            'is_protected'=>1,
            'is_active'=>1
        ],[

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'API Generator',
            'icon'=>'fa fa-cloud-download',
            'path'=>'api_generator',
            'table_name'=>'',
            'controller'=>'ApiCustomController',
            'is_protected'=>1,
            'is_active'=>1
        ],[

            'created_at'=>date('Y-m-d H:i:s'),
            'name'=>'Logs',
            'icon'=>'fa fa-flag-o',
            'path'=>'logs',
            'table_name'=>'cms_logs',
            'controller'=>'LogsController',
            'is_protected'=>1,
            'is_active'=>1
        ]
            ];


        foreach($data as $k=>$d) {
            if(DB::table('cms_moduls')->where('name',$d['name'])->count()) {
                unset($data[$k]);
            }
        }

        DB::table('cms_moduls')->insert($data);
    }

}

class Cms_usersSeeder extends Seeder {

    public function run()
    {

        if(DB::table('cms_users')->count() == 0) {
            $password = \Hash::make('123456');
            $cms_users = DB::table('cms_users')->insert(array(
                'id'                =>DB::table('cms_users')->max('id')+1,
                'created_at'        => date('Y-m-d H:i:s'),
                'name'              => 'Super Admin',
                'email'             => 'admin@crudbooster.com',
                'password'          => $password,
                'id_cms_privileges' => 1,
                'status'            =>'Active',
                'stores_id'         => '1',
            ));
        }

    }

}

