<?php

namespace App\Console\Commands\Stock;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Stock;
use App\Models\StockMongo;
use App\Models\Stores;
use App\Repositories\stock\StockRepo;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class updateStockMongo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:updateStockMongo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        try{

            DB::beginTransaction();
            $sede = 1;

            $list_product = StockRepo::getLastStock($sede);
            $this->info($list_product[0]);
            $this->info($list_product[0]->name);


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

                $this->info($product['name']);

            }

            DB::commit();

            \Log::debug('SUCCESS - command:updateStockMongo');
            $this->info("SUCCESS");
        }catch (\Exception $exception) {
            \Log::debug($exception);
            $this->info($exception);
            $this->info("ERROR command:updateStockMongo");
        }

        return 0;
    }


}
