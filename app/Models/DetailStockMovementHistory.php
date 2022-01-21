<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailStockMovementHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    //local
    protected $table = "detail_stock_movement_history";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'stock_movement_history_id',
        'inventory_id',
        'stores_id',
        'orders_detail_id'

    ];

}
