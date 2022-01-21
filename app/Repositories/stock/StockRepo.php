<?php

namespace App\Repositories\stock;

use App\Models\productKitDetail;
use App\Models\Products;
use App\Models\Stock;
use GuzzleHttp;
use GuzzleHttp\Exception;

class StockRepo
{

    static function  getLastStock($sede)
    {
        $products = Products::with('detailKit')->get();

        $list_product = [];
//        dd($products[0]->);
        foreach ( $products as $product ){



            if( $product->type == Products::KIT ){

                if ( $product->detailKit != '[]' ) {

                    $incomplete = false;
                    $priceKit = 0;
                    $lastUpdatedStock = [];

                    foreach ( $product->detailKit as $key => $product_detail ){


                        $stocks = Stock::where("products_id", "=", $product_detail->products_id)
                            ->where("stores_id","=",$sede)
                            ->select('stock_in','price_products','products_id')
                            ->orderBy('created_at', 'desc')
                            ->first();

                        if( $stocks == '[]' ){
                            $incomplete = true;
                        }

                        if( $stocks->price_products > $lastUpdatedStock->price_products??0 ){
                            $lastUpdatedStock = $stocks;
                        }

                        $priceKit += $stocks->price_products * $product_detail->quantity;

                    }

                    $quantity = 0;

                    $stocks = Stock::where("products_id", "=", $lastUpdatedStock->products_id)
                        ->where("stores_id","=",$sede)
                        ->where("stock_in", "!=", "0")
                        ->select('stock_in','price_products')
                        ->orderBy('created_at', 'asc')
                        ->get();

                    if ( $stocks ) {

                        foreach ( $stocks as $stock ){
                            $quantity += $stock->stock_in;
                        }

                        array_push($list_product, [

                            "id_product" => $product->id,
                            "picture"=>$product->picture,
                            "name"=>$product->name,
                            "quantity"=>$quantity,
                            "minimum_ammount"=>$product->minimum_ammount,
                            "price"=>$priceKit,
                            "commercial_sale_price"=>$product->commercial_sale_price,
                            "discount" => $priceKit != null || $priceKit != 0? (($priceKit - $product->commercial_sale_price)/$priceKit)*100:0,
                            "type"=>$product->type,
                            "categories_id"=>$product->categories_id,
                            "stores_id"=>$product->stores_id,
                            "incomplete"=>$incomplete,
                            "is_public" => $product->is_public==null?false:$product->is_public,
                            "public_description" => $product->public_description,
                            "kit"=> productKitDetail::where('products_kit_id', $product->id)
                                ->join('products', 'products.id', '=', 'product_kit_detail.products_id' )
                                ->select('products.id','products.name','products.commercial_sale_price','product_kit_detail.quantity')
                                ->get()

                        ]);

                    }

                }


            }else{

                $incomplete = false ;
                $LastPriceStock = Stock::where("products_id", "=", $product->id)
                    ->where("stores_id","=",$sede)
                    ->select('price_products')
                    ->orderBy('created_at', 'desc')
                    ->first()->price_products;



                if( $LastPriceStock == null ||$LastPriceStock == 0 ){
                    $incomplete = true;
                }

                $quantity = 0;
                $stocks = Stock::where("products_id", "=", $product->id)
                    ->where("stores_id","=",$sede)
                    ->where("stock_in", "!=", "0")
                    ->select('stock_in','price_products')
                    ->orderBy('created_at', 'asc')
                    ->get();

                if ( $stocks ) {

                    foreach ( $stocks as $stock ){
                        $quantity += $stock->stock_in;
                    }

                    array_push($list_product, [

                        "id_product" => $product->id,
                        "picture"=>$product->picture,
                        "name"=>$product->name,
                        "quantity"=>$quantity,
                        "minimum_ammount"=>$product->minimum_ammount??0,
                        "price"=>$LastPriceStock,
                        "commercial_sale_price"=>$product->commercial_sale_price,
                        "discount" =>  $LastPriceStock != null || $LastPriceStock != 0?(double)(($LastPriceStock - $product->commercial_sale_price)/$LastPriceStock)*100:0,
                        "type"=>$product->type,
                        "categories_id"=>$product->categories_id,
                        "stores_id"=>$product->stores_id,
                        "incomplete"=>$incomplete,
                        "is_public" => $product->is_public==null?false:$product->is_public,
                        "public_description" => $product->public_description,

                    ]);

                }

            }
        }

        return $list_product;
    }


}

