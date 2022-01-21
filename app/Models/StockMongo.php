<?php

namespace App\Models;

//Mongodb
use Jenssegers\Mongodb\Eloquent\Model as EloquentModel;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

//local
//use Illuminate\Database\Eloquent\Model as EloquentModel;
//use Illuminate\Database\Eloquent\SoftDeletes;



class StockMongo extends EloquentModel
{

    use SoftDeletes;

    //Mongodb
    protected $connection = 'mongodb';
    protected $collection = 'ApiStock';

    //local
//    protected $table = "ApiStock";

    protected $fillable = [
        'id_product',
        'picture',
        'name',
        'quantity',
        'price',
        'commercial_sale_price',
        'discount',
        'type',
        'categories_id',
        'stores_id',
        'incomplete',
        'store_identification_number',
        'is_public',
        'public_description'
    ];
}
