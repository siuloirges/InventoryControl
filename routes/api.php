<?php

use App\Models\Stock;
use App\Models\StockMongo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::prefix('v1')->group(function () {
//    Route::post('/orders', App\Http\Controllers\GetOrder::class);
//    Route::post('/ordersUpdate', App\Http\Controllers\UpdateOrder::class);
//    Route::post('/toCompletedOrder', App\Http\Controllers\ToCompletedOrder::class);
//    Route::post('/nextStatusOrder', App\Http\Controllers\NextStatusOrder::class);
      Route::get('/mongo',function (){
          return \App\Models\StockMongo::get();
      });




//
    Route::get('/test',function (){





    });

//        Route::group(['middleware' => ['cors']], function () {
            Route::post('/new_call', App\Http\Controllers\NewCall::class);
            Route::post('/lost_call', App\Http\Controllers\lostCall::class);

            Route::post('/solicitud_contraentrega', App\Http\Controllers\SolicitudContraEntregaController::class);

            Route::post('/get_municipio_by_id', App\Http\Controllers\GetMunicipioById::class);

//          Route::post('/get_stock', App\Http\Controllers\StockApi::class);

//        });



    });

