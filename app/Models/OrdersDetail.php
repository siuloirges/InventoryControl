<?php

namespace App\Models;

use Database\Factories\OrdersDetailFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdersDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "orders_detail";
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         'orders_id',
         'products_id',
         'products_name',
         'products_price',
         'quantity',
         'sub_total',
         'products_sku',
      ];
  
      protected static function newFactory():OrdersDetailFactory
      {
        return OrdersDetailFactory::new();
      }
}
