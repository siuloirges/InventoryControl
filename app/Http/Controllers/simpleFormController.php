<?php

namespace App\Http\Controllers;

use App\Models\Prospectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class simpleFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        try {

            $phoneNumber = $request->phone_number;

            $prospecto = Prospectos::where('contact_1', $phoneNumber)->orWhere('contact_2',  $phoneNumber)->get()->first();

            if ($prospecto == null) {

                $prospecto = new Prospectos();
                $prospecto->contact_1 =  $phoneNumber;
                $prospecto->names = $request->nombres;
                $prospecto->stores_id = 1;

            }
//            $prospecto->tipo_contacto = "prospecto";
            $prospecto->type_prospecto_id = DB::table('type_prospectos')->where("name","LIKE","%SPIRNET%")->first()->id;

            $prospecto->description  = $prospecto->descripcion . " ## PREFIERE LLAMADA " . now() . " " . $request->departamento ."From: ". str_replace('/gracias-por-contactar/','',$request->host)." ##";
            $prospecto->status = "Por Contactar";

            $prospecto->save();


            return redirect()->away($request->host);
        } catch (\Exception $e) {
//            return redirect()->away($request->host);
            return response()->json([
                'result' => 'error',
                'error' => $e
            ]);
        }
    }
}
