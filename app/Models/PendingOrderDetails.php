<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendingOrderDetails extends Model
{
    
    use SoftDeletes;
    protected $table = "pending_order_details";
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
         'orders_id',
         'order_detail'
      ];
  
}
