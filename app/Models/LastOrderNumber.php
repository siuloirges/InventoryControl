<?php

namespace App\Models;

//Mongodb
use Jenssegers\Mongodb\Eloquent\Model as EloquentModel;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

////local
//use Illuminate\Database\Eloquent\Model as EloquentModel;
//use Illuminate\Database\Eloquent\SoftDeletes;


class LastOrderNumber extends EloquentModel
{

    use SoftDeletes;

   // Mongodb
    protected $connection = 'mongodb';
    protected $collection = 'last_order_number';

//    //local
//     protected $table = "last_order_number";


    /**
     * @var array
     */
    protected $fillable = [
        '_id',
        'order_number',
        'created_at',
        'updated_at'
    ];

}
