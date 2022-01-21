<?php

use App\Http\Controllers\Informacion;
use App\Http\Controllers\Preguntas;
use App\Http\Controllers\ViewOrdersDetail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Turnero;
use App\Http\Controllers\Wallet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/Turnero', [Turnero::class, 'index']);
Route::get('/Turnero', [Turnero::class, 'index']);

Route::get('/OrderEditDetail', [ViewOrdersDetail::class, 'update']);
Route::get('admin/OrderEditDetail', [ViewOrdersDetail::class, 'update']);

Route::get('admin/ViewOrdersDetail', [ViewOrdersDetail::class, 'index']);
Route::get('/ViewOrdersDetail', [ViewOrdersDetail::class, 'index']);

Route::get('admin/Wallet',  [Wallet::class, 'index']);
Route::get('/Wallet',  [Wallet::class, 'index']);

Route::get('admin/Preguntas',  [Preguntas::class, 'index']);
Route::get('admin/recursos/Preguntas',  [Preguntas::class, 'index']);
Route::get('/Preguntas',  [Preguntas::class, 'index']);

Route::get('admin/Informacion',  [Informacion::class, 'index']);
Route::get('admin/recursos/Informacion',  [Informacion::class, 'index']);
Route::get('/Informacion',  [Informacion::class, 'index']);

Route::get('admin/TURNERO-SAVE', [Turnero::class, 'store']);
Route::get('/TURNERO-SAVE', [Turnero::class, 'store']);
Route::get('/simple_form', [\App\Http\Controllers\simpleFormController::class, '__invoke']);
