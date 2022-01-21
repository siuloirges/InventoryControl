<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Relations\HasMany;

class Prospectos extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "prospecto";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //TYPES OF PRODUCTS
//    const PRODUCT  = "PRODUCT";
//    const KIT = "KIT";

    protected $fillable = [

     'type_prospecto_id',
     'type_document_id',
     'document_number',
     'names',
     'last_names',
     'contact_1',
     'contact_2',
     'email_1',
     'email_2',
     'department_id',
     'municipality_id',
     'adress',
     'status',
     'description',
     'qualification',
     'user_id',
     'stores_id',
     'is_client'

    ];

//    protected static function newFactory():ProductFactory
//    {
//        return ProductFactory::new();
//    }

}
