<?php

namespace App\Http\Controllers;

use App\Models\Products;

use App\Models\Stock;
use App\Models\StockMongo;
use Illuminate\Http\Request;

class StockApi extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//        try{
//
//            $filter = $request->filter;
//            $sede = $request->id_sede??1;
//
//            $product = Products::with('detailKit')->get();
//
//            $list_product = [];
//
//            foreach ($product as $product  ){
//
//                if($product->type == Products::KIT){
//
//                    if ( $product->detailKit != '[]' ) {
//
//                        $lastUpdatedStock = [];
//                        foreach ( $product->detailKit as $key => $product_detail ){
//
//                            $stocks = Stock::where("products_id", "=", $product_detail->products_id)
//                                ->where("stores_id","=",$sede)
//                                ->where("stock_in", "!=", "0")
//                                ->select('stock_in','price_products','products_id')
//                                ->orderBy('created_at', 'asc')
//                                ->first();
//
//                            if( $stocks->price_products > $lastUpdatedStock->price_products??0 ){
//                                 $lastUpdatedStock = $stocks;
//                            }
//
//                        }
//
//                        $price =0;
//                        $quantity = 0;
//                        $stocks = Stock::where("products_id", "=", $lastUpdatedStock->products_id)
//                            ->where("stores_id","=",$sede)
//                            ->where("stock_in", "!=", "0")
//                            ->select('stock_in','price_products')
//                            ->orderBy('created_at', 'asc')
//                            ->get();
//
//                        if ( $stocks ) {
//
//                            foreach ( $stocks as $stock ){
//                                $quantity += $stock->stock_in;
//                                $price = $stock->price_products;
//                            }
//                            array_push($list_product,[ "picture"=>$product->picture, "name"=>$product->name,"quantity"=>$quantity,"price"=>$price,"type"=>$product->type,"categories_id"=>$product->categories_id, "stores_id"=>$product->stores_id ]);
//
//                        }
//
//                    }
//
//                }else{
//
//                    $price=0;
//                    $quantity = 0;
//                    $stocks = Stock::where("products_id", "=", $product->id)
//                        ->where("stores_id","=",$sede)
//                        ->where("stock_in", "!=", "0")
//                        ->select('stock_in','price_products')
//                        ->orderBy('created_at', 'asc')
//                        ->get();
//
//                    if ( $stocks ) {
//
//                        foreach ( $stocks as $stock ){
//                            $quantity += $stock->stock_in;
//                            $price = $stock->price_products;
//                        }
//
//                        array_push($list_product,["picture"=>$product->picture, "name"=>$product->name,"quantity"=>$quantity,"price"=>$price,"type"=>$product->type,"categories_id"=>$product->categories_id,"stores_id"=>$product->stores_id ]);
//
//                    }
//                }
//            }
//
//
//            $StocksMongo = StockMongo::get();
//
//            foreach ($StocksMongo as $product){
//                $product->delete();
//            }
//
//
//            foreach ($list_product as $product){
//
//                $stock = new StockMongo();
//                $stock->name = $product['name'];
//                $stock->quantity = $product['quantity'];
//                $stock->price = $product['price'];
//                $stock->type = $product['type'];
//                $stock->stores_id =$product['stores_id'];
//                $stock->categories_id = $product['categories_id'];
//                $stock->save();
//
//            }
//
//            return response()->json([
//                'success'=>true,
//                'data'=>$list_product,
//                'message'=>'Ok'
//            ], 200);
//
//        }catch (\Exception $exception) {
//            return  response()->json([
//                'data'=>$exception->getMessage(),
//                'success'=>false,
//                'message'=>'error interno al guardar solicitud_contraentrega'
//            ],500);
//        }
    }
}
