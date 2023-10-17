<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Admin;
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
Route::post('get-customer',[Admin::class,'getCustomer']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('get-product',[Admin::class,'getProduct']);
