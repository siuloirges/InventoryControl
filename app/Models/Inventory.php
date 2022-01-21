<?php

namespace App\Models;

use Database\Factories\InventoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "inventory";
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
        'stocks_id',
        'imei',
        'is_sold',
        'reference',
        'order_id',
        'orders_detail_id'
      ];




    public function stock(){

      return $this->hasOne(Stock::class,'id','stocks_id');

    }

//    public function stockByProductId($product_id){
//
//      return $this->hasOne(Stock::class,'id','stocks_id')->where('');
//
//    }

//    public function stockProduct(){
//
//        return $this->hasOne(Stock::class,'id','stocks_id')
//            ->join('products', 'stocks.products_id', '=', 'products.id')
//                ->select('products.id as id_product','products.name','stocks.*');
//
//    }



      // public function Stocks(){

      //   $Stocks = $this->hasMany(Stock::class,'id');
      //   return $Stocks;

      // }





      protected static function newFactory():InventoryFactory
      {
        return InventoryFactory::new();
      }
}
