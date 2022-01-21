<?php

namespace App\Models;

use Database\Factories\StockFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

//local
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;

    //local
  protected $table = "stocks";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
       'stores_id',
       'products_id',
       'cms_users_id',
       'suppliers_id',
       'price_products',
       'cost',
       'stock',
       'stock_in',
       'stock_out',
       'description'
      ];

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class, "stocks_id");
    }

    protected static function newFactory(): StockFactory
    {
        return StockFactory::new();
    }
}
