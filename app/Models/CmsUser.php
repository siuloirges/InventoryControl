<?php

namespace App\Models;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CmsUser extends Model
{
    protected $table = "cms_users";

    //roles
    const Coordinador = 5;
    const AdministradorDeTienda = 4;
    const OperadorBodega = 3;
    const AsesorComercial = 2;

    protected $fillable = [
        'name',
        'photo',
        'email',
        'password',
        'id_cms_privileges',
        'stores_id',
        'status',
        'available',
        'last_assign',
        'code'
    ];

    public function scopeGetCurrentStore()
    {
        return CmsUser::where('id', CRUDBooster::myId())
            ->select('stores_id')
            ->first()->stores_id;
    }

    public function getStoresId(){
        return CmsUser::where('id', '=', CRUDBooster::myId())->first()->stores_id;
    }


}
