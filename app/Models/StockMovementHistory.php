<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMovementHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    //local
    protected $table = "stock_movement_history";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'quantity',
        'is_in',
        'is_out',

        'stores_id',
        'stocks_id',
        'orders_detail_id',
        'order_id'
    ];


}
