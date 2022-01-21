<?php

namespace App\Models;

//Mongodb
use Jenssegers\Mongodb\Eloquent\Model as EloquentModel;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

//local
// use Illuminate\Database\Eloquent\Model as EloquentModel;
// use Illuminate\Database\Eloquent\SoftDeletes;


class ReservedOrders extends EloquentModel
{
     //mongo
     protected $connection = 'mongodb';
     protected $collection = 'reserved_orders';

    //local
//    protected $table = "reserved_orders";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'gateway_agent_identifier_code',
        'store_identification_number',
        'order_number', //  "order_number":"0002",
        'list_product', // json [ { “product_id“:"",”quantity”:"",”sale_price”:"",”discount”:"" }, { “product_id“:"",”quantity”:"",”sale_price”:"",”discount”:"" }  ]
        'client', // json {"name","last_name","number_phone" ... }
        'success', // bool "true|false"
        'number_of_attemps', // int
        'from', // string
        'created_at', // timeStamp
        'updated_at'  // timeStamp

    ];

}
