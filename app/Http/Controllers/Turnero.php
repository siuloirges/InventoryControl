<?php

namespace App\Http\Controllers;

use App\Models\CmsSettings;


use App\Models\CmsUser;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Turnero extends Controller
{

    public function index()
    {

        $admin_path = config('crudbooster.ADMIN_PATH') ?: 'admin';
        if (CRUDBooster::myPrivilegeId() == null) {
            $url = url($admin_path . '/login');
            return redirect($url)->with('message', trans('crudbooster.not_logged_in'));
        }

        $asesores = CmsUser::whereIn('id_cms_privileges',['2','5'])->get();
        $estado = CmsSettings::where('name','turnero_estado')->first();
        $modo = CmsSettings::where('name','turnero_modo')->first()  ;

        return view('turnero', compact('asesores','estado', 'modo'));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request = $request->all();
        foreach ($request as $key => $value) {

            echo $key.' | ';

            if($key ==  '_token'){



            }else if($key ==  'estado'){
                $estado = CmsSettings::where('name', 'turnero_estado')->first();
                $estado->content = $value == 'on' ? 1 : 0;
                $estado->save();
            }elseif($key ==  'modo'){
                $modo = CmsSettings::where('name', 'turnero_modo')->first();
                $modo->content = $value == 'on' ? 'carga' : 'lineal';
                $modo->save();
            }else{
                DB::table('cms_users')->where('id',$key)->update([
                    'available'=>$value=='on' ? 1 : 0,
                ]);

            }
        }
//        dd($request);

        CRUDBooster::redirect($_SERVER['HTTP_REFERER'], "Datos guardados correctamente", "success");

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
