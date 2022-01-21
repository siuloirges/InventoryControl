<?php


namespace App\Repositories\stock\updateStockMongo;


use App\Models\Categories;
use App\Models\StockMongo;
use App\Models\Stores;
use App\Repositories\stock\StockRepo;
use App\Repositories\stock\updateStockMongo\Contracts\UpdateStockMongoInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UpdateStockMongoRepository implements UpdateStockMongoInterface
{

    public function updateCommersialsPages(){

        $route = 'https://api-stock.tanuncia.net/api/v1/update_commercials_pages';
        if( env('APP_IN_TESTING') ){
            $route = 'https://api-test-stock.tanuncia.net/api/v1/update_commercials_pages';
        }
        Http::get($route);
        return true;
    }

    public function updateStock($sede){

        try{

            DB::beginTransaction();
//            $sede = 1;

            $list_product = StockRepo::getLastStock($sede);

            //TODO IMPLEMENT LA ACTUALIZACION DE LAS DIFERENTES SEDES
            StockMongo::truncate();

            foreach ($list_product as $product){

                $store_identification_number = Stores::where('identification_number',  $product['stores_id'])
                    ->select("identification_number")
                    ->first()
                    ->identification_number;

                $stock = new StockMongo();
                $stock->id_product = $product['id_product'];
                $stock->picture = $product['picture'];
                $stock->name = $product['name'];
                $stock->quantity = $product['quantity'];
                $stock->price = $product['price'];
                $stock->commercial_sale_price = $product['commercial_sale_price'];
                $stock->discount = $product['discount'];
                $stock->type = $product['type'];
                $stock->categories_id = Categories::find( $product['categories_id'])->name;
                $stock->incomplete = $product['incomplete'];
                $stock->store_identification_number = $store_identification_number;
                $stock->is_public = $product['is_public'];
                $stock->public_description = $product['public_description'];
                $stock->kit = json_encode($product['kit']);
                $stock->save();

            }

            DB::commit();

        }catch (\Exception $exception) {
            \Log::debug($exception);
        }
    }


}
