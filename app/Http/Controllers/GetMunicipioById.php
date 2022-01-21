<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetMunicipioById extends Controller
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
                $municipios = \Illuminate\Support\Facades\DB::table('municipalitys')->where('department_id','=',request()->departamento_id)->get();

                return response()->json([
                    'success'=>true,
                    'data'=> $municipios,
                    'message'=>'Buen trabajo, los datos se han guardado exitiamente'
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
