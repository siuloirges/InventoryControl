<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudContraEntregaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
            try{

                $request =  request()->all();

                $prospecto =new \App\Models\Prospectos();

                    $prospecto->type_prospecto_id = "2";
                    $prospecto->type_document_id = "1";
                    $prospecto->document_number = request()->numero_cedula;
                    $prospecto->names = request()->nombres;
                    $prospecto->last_names = request()->apellidos;
                    $prospecto->contact_1 = request()->telefono1;
                    $prospecto->contact_2 = request()->telefono2;
                    $prospecto->email_1 =request()->email;
                    $prospecto->department_id= request()->departamento_id;
                    $prospecto->municipality_id= request()->municipio_id;
                    $prospecto->adress=  request()->direccion;
                    $prospecto->description= "tipo producto: ".request()->tipo_producto."\ntipo producto: ".request()->equipo;
                    $prospecto->user_id = "";
                    $prospecto->stores_id = "1";



                    $prospecto->save();


                return response()->json([
                    'success'=>true,
                    'data'=>$prospecto, 'message'=>'Buen trabajo, los datos se han guardado exitiamente'
                ], 200);

            }catch (\Exception $exception) {
                return  response()->json([
                    'data'=>$exception->getMessage(),
                    'success'=>false,
                    'message'=>'error interno al guardar solicitud_contraentrega'
                ],500);
            }


    }
}
