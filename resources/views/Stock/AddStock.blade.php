@extends('crudbooster::admin_template')
@section('content')

    <div class="text-left">

       <section class="content-header">
                                        <h1>
                    <!--Now you can define $page_icon alongside $page_tite for custom forms to follow CRUDBooster theme style -->
                    <!-- <i class="fa fa-inbox"></i> Añadir Stock &nbsp;&nbsp; -->

                    <!--START BUTTON -->

                    

                    
                    
                <!--ADD ACTIon-->
                                    <!-- END BUTTON -->
                </h1>


                <ol class="breadcrumb">
                    <li><a href="https://stock-manager.test/admin"><i class="fa fa-dashboard"></i> Principal</a></li>
                    <li class="active">Stock</li>
                </ol>
                    </section>

                    <section id="content_section" class="content">

            

            


        <!-- Your Page Content Here -->
            
    <div>

                                    <p><a title="Return" href="https://stock-manager.test/admin/stocks"><i class="fa fa-chevron-circle-left "></i>
                        &nbsp; Volver al listado Stock</a></p>
                    
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class="fa fa-inbox"></i> Añadir Stock</strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                                <form class="form-horizontal" method="post" id="form" enctype="multipart/form-data" action="https://stock-manager.test/admin/stocks/add-save">
                    <input type="hidden" name="_token" value="Q8HN09yynpoJ1ehrWyReyjfUE4ojHU2us4B9CsvJ">
                    <input type="hidden" name="return_url" value="https://stock-manager.test/admin/stocks">
                    <input type="hidden" name="ref_mainpath" value="https://stock-manager.test/admin/stocks">
                    <input type="hidden" name="ref_parameter" value="return_url=https://stock-manager.test/admin/stocks&amp;parent_id=&amp;parent_field=">
                                        <div class="box-body" id="parent-form-area">

                                                    <div class="form-group header-group-0 " id="form-group-stores_id" style="">
    <label class="control-label col-sm-2">Tiendas
                    <span class="text-danger" title="Este campo es requerido">*</span>
            </label>

    <div class="col-sm-10">
        <select style="width:100%" class="form-control select2-hidden-accessible" id="stores_id" required="" name="stores_id" tabindex="-1" aria-hidden="true">
            
                                                                        <option value="">** Selecciona un Tiendas</option>
                        <option value="35">tienda de (256) 474-2621</option><option value="5">tienda de (364) 603-3619</option><option value="40">tienda de (575) 486-0772</option><option value="39">tienda de (657) 563-9678</option><option value="7">tienda de (762) 445-1082</option><option value="29">tienda de (930) 545-7127</option><option value="11">tienda de (959) 719-8597</option><option value="28">tienda de (971) 343-3882</option><option value="15">tienda de +1 (240) 364-6815</option><option value="36">tienda de +1 (425) 251-6859</option><option value="10">tienda de +1 (484) 564-4282</option><option value="16">tienda de +1 (650) 513-3814</option><option value="21">tienda de +1 (878) 347-1316</option><option value="8">tienda de +1-240-756-8783</option><option value="1">tienda de +1-410-225-2392</option><option value="13">tienda de +1-424-462-7636</option><option value="14">tienda de +1-727-277-2471</option><option value="38">tienda de +1-854-795-6221</option><option value="9">tienda de +1-913-404-8479</option><option value="4">tienda de +1.281.378.3555</option><option value="37">tienda de +1.281.604.2024</option><option value="32">tienda de +1.534.782.4807</option><option value="17">tienda de +1.804.468.4775</option><option value="22">tienda de +1.984.279.6104</option><option value="3">tienda de +18209332644</option><option value="26">tienda de +19529235280</option><option value="18">tienda de 1-680-707-3838</option><option value="27">tienda de 1-731-593-3068</option><option value="6">tienda de 1-805-678-4533</option><option value="20">tienda de 1-847-479-2126</option><option value="2">tienda de 1-909-782-8505</option><option value="12">tienda de 1-913-366-2797</option><option value="24">tienda de 206.825.8778</option><option value="23">tienda de 408-830-9026</option><option value="25">tienda de 430.484.2719</option><option value="34">tienda de 512.450.1978</option><option value="19">tienda de 518.533.0367</option><option value="33">tienda de 646-654-3061</option><option value="31">tienda de 737-282-1081</option><option value="30">tienda de 830.555.5053</option>                    <!--end-datatable-ajax-->
                    
                <!--end-relationship-table-->
                
            <!--end-datatable-->
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-stores_id-container"><span class="select2-selection__rendered" id="select2-stores_id-container" title="** Selecciona un Tiendas">** Selecciona un Tiendas</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        <div class="text-danger">
            
        </div><!--end-text-danger-->
        <p class="help-block"></p>

    </div>
</div>
    <div class="form-group header-group-0 " id="form-group-products_id" style="">
    <label class="control-label col-sm-2">Productos
                    <span class="text-danger" title="Este campo es requerido">*</span>
            </label>

    <div class="col-sm-10">
        <select style="width:100%" class="form-control select2-hidden-accessible" id="products_id" required="" name="products_id" tabindex="-1" aria-hidden="true">
            
                                                                        <option value="">** Selecciona un Productos</option>
                        <option value="10">Alda Lesch IV</option><option value="12">Annamarie Johnston</option><option value="20">Avery Price</option><option value="19">Bernadine Marvin</option><option value="37">Bernita Vandervort</option><option value="26">Chanel Reichert IV</option><option value="29">Chelsie Mills</option><option value="31">Cielo Conroy</option><option value="5">Clare Waters</option><option value="11">Cydney Mayer</option><option value="33">Cyril Hammes Sr.</option><option value="16">Deja Dickinson</option><option value="2">Dessie Bahringer</option><option value="22">Dr. Dalton Zemlak MD</option><option value="7">Dr. Daniela Hamill</option><option value="35">Elliot Thiel</option><option value="34">Fernando Schimmel</option><option value="13">Jamel Hagenes</option><option value="17">Janick Grady</option><option value="4">Jerod Casper</option><option value="9">Joy Reilly IV</option><option value="1">Kara Borer</option><option value="24">Kaycee Grimes</option><option value="27">Lorenz Heaney IV</option><option value="8">Louisa Herman</option><option value="18">Miles Smitham IV</option><option value="15">Miss Althea Beier II</option><option value="38">Miss Olga Hartmann PhD</option><option value="25">Mr. Alberto Hammes V</option><option value="39">Mr. Brant Rodriguez</option><option value="40">Mrs. Alexandra Kessler IV</option><option value="23">Mrs. Kiera Abernathy IV</option><option value="28">Oda Wilderman</option><option value="32">Prof. Virginia Durgan</option><option value="21">Quinten Beier III</option><option value="30">Roderick Ebert</option><option value="3">Rosario Murray</option><option value="36">Tierra Bergstrom</option><option value="6">Vivien King</option><option value="14">Webster Hayes</option>                    <!--end-datatable-ajax-->
                    
                <!--end-relationship-table-->
                
            <!--end-datatable-->
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-products_id-container"><span class="select2-selection__rendered" id="select2-products_id-container" title="** Selecciona un Productos">** Selecciona un Productos</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        <div class="text-danger">
            
        </div><!--end-text-danger-->
        <p class="help-block"></p>

    </div>
</div>
    <div class="form-group header-group-0 " id="form-group-cost" style="">
    <label class="control-label col-sm-2">Costo
                    <span class="text-danger" title="Este campo es requerido">*</span>
            </label>

    <div class="col-sm-10">
        <input type="text" title="Costo" required="" class="form-control inputMoney" name="cost" id="cost" value="">
        <div class="text-danger"></div>
        <p class="help-block"></p>
    </div>
</div>
    <div class="form-group header-group-0 " id="form-group-price_products" style="">
    <label class="control-label col-sm-2">Precio producto
                    <span class="text-danger" title="Este campo es requerido">*</span>
            </label>

    <div class="col-sm-10">
        <input type="text" title="Precio producto" required="" class="form-control inputMoney" name="price_products" id="price_products" value="">
        <div class="text-danger"></div>
        <p class="help-block"></p>
    </div>
</div>
    <input type="hidden" name="cms_users_id" value="1">    <div class="form-group header-group-0 " id="form-group-suppliers_id" style="">
    <label class="control-label col-sm-2">Proveedor
                    <span class="text-danger" title="Este campo es requerido">*</span>
            </label>

    <div class="col-sm-10">
        <select style="width:100%" class="form-control select2-hidden-accessible" id="suppliers_id" required="" name="suppliers_id" tabindex="-1" aria-hidden="true">
            
                                                                        <option value="">** Selecciona un Proveedor</option>
                        <option value="36">Abby Tillman</option><option value="32">Adah Boyle</option><option value="6">Alaina Dach I</option><option value="26">Alejandrin Donnelly</option><option value="28">Alysa Blanda</option><option value="31">Anita Rice II</option><option value="11">Athena Torp</option><option value="38">Aubree Cruickshank</option><option value="4">Beulah Considine</option><option value="10">Braulio Orn</option><option value="34">Dr. Luz Zboncak I</option><option value="5">Dr. Matilde Hintz</option><option value="19">Erna Hackett</option><option value="37">Ernestina Schroeder</option><option value="17">Ivah Becker</option><option value="13">Jamie Denesik</option><option value="21">Kallie Wilderman</option><option value="25">Lelia Fritsch</option><option value="2">Letitia Maggio IV</option><option value="23">Madge Johnston IV</option><option value="33">Manuela Herzog</option><option value="8">Marquis Dooley</option><option value="35">Maximus Mohr</option><option value="27">Melyssa Rowe</option><option value="18">Miguel Torphy</option><option value="9">Mikayla Considine</option><option value="1">Mozelle Ankunding III</option><option value="7">Mrs. Catalina McDermott DDS</option><option value="29">Mrs. Elisa Cummerata DVM</option><option value="22">Mrs. Mariah Connelly IV</option><option value="39">Mrs. Martina Mohr</option><option value="14">Ms. Kali Powlowski</option><option value="12">Myrtle Windler</option><option value="15">Nelle Jast</option><option value="3">Nettie Gerlach</option><option value="20">Nickolas Okuneva</option><option value="30">Phyllis Hettinger</option><option value="24">Selina Kihn</option><option value="40">Tiara Thiel Jr.</option><option value="16">Violette Larson</option>                    <!--end-datatable-ajax-->
                    
                <!--end-relationship-table-->
                
            <!--end-datatable-->
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-suppliers_id-container"><span class="select2-selection__rendered" id="select2-suppliers_id-container" title="** Selecciona un Proveedor">** Selecciona un Proveedor</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        <div class="text-danger">
            
        </div><!--end-text-danger-->
        <p class="help-block"></p>

    </div>
</div>
    <div class="form-group header-group-0 " id="form-group-stock" style="">
    <label class="control-label col-sm-2">Cantidad
                    <span class="text-danger" title="Este campo es requerido">*</span>
            </label>

    <div class="col-sm-10">
        <input type="number" step="1" title="Cantidad" required="" class="form-control" name="stock" id="stock" value="">
        <div class="text-danger"></div>
        <p class="help-block"></p>
    </div>
</div>    <div class="form-group header-group-0 " id="form-group-stock_in" style="">
    <label class="control-label col-sm-2">Entradas
            </label>

    <div class="col-sm-10">
        <input type="number" step="1" title="Entradas" readonly="" class="form-control" name="stock_in" id="stock_in" value="">
        <div class="text-danger"></div>
        <p class="help-block"></p>
    </div>
</div>    <div class="form-group header-group-0 " id="form-group-stock_out" style="">
    <label class="control-label col-sm-2">Salidas
            </label>

    <div class="col-sm-10">
        <input type="number" step="1" title="Salidas" readonly="" class="form-control" name="stock_out" id="stock_out" value="">
        <div class="text-danger"></div>
        <p class="help-block"></p>
    </div>
</div>    <div class="form-group header-group-0 " id="form-group-description" style="">
    <label class="control-label col-sm-2">Description
            </label>
    <div class="col-sm-10">
        <textarea name="description" id="description" maxlength="255" class="form-control" rows="5"></textarea>
        <div class="text-danger"></div>
        <p class="help-block"></p>
    </div>
</div>    <div class="form-group header-group-0" id="form-group-inventario">

            <div class="col-sm-12">

            <div id="panel-form-inventario" class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bars"></i> Inventario
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-sm-10">
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil-square-o"></i> Formulario</div>
                                <div class="panel-body child-form-area">
                                                                                                                    <div class="form-group">
                                                                                            <label class="control-label col-sm-2">IMEI
                                                     <span class="text-danger" title="Este campo es requerido">*</span>                                                 </label>
                                                                                        <div class="col-sm-10">
                                                                                                    <input id="inventarioimei" type="text" name="child-imei" class="form-control required">
                                                
                                                                                            </div>
                                        </div>

                                        
                                                                                                                    <div class="form-group">
                                                                                            <label class="control-label col-sm-2">Referencia
                                                                                                    </label>
                                                                                        <div class="col-sm-10">
                                                                                                    <textarea id="inventarioreference" name="child-reference" class="form-control "></textarea>
                                                
                                                                                            </div>
                                        </div>

                                        
                                    
                                                                    </div>
                                <div class="panel-footer" align="right">
                                    <input type="button" class="btn btn-default" id="btn-reset-form-inventario" onclick="resetForminventario()" value="Resetear">
                                    <input type="button" id="btn-add-table-inventario" class="btn btn-primary" onclick="addToTableinventario()" value="Agregar a la Tabla">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-table"></i> Tabla de Detalles
                        </div>
                        <div class="panel-body no-padding table-responsive" style="max-height: 400px;overflow: auto;">
                            <table id="table-inventario" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                                                            <th>IMEI</th>
                                                                            <th>Referencia</th>
                                                                        <th width="90px">Acción</th>
                                </tr>
                                </thead>
                                <tbody>

                                
                                                                    <tr class="trNull">
                                        <td colspan="3" align="center">No tenemos datos disponibles</td>
                                    </tr>
                                                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>


        </div>


    </div>
                                            </div><!-- /.box-body -->

                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                                                                                            <a href="https://stock-manager.test/admin/stocks" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Volver</a>
                                                                                                    
                                                                            <input type="submit" name="submit" value="Guardar y Añadir otro" class="btn btn-success">
                                    
                                                                            <input type="submit" name="submit" value="Guardar" class="btn btn-success">
                                    
                                                            </div>
                        </div>


                    </div><!-- /.box-footer-->

                </form>

            </div>
        </div>
    </div><!--END AUTO MARGIN-->

        </section>

    </div>


@endsection
