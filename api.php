<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {});
Route::get('v1/customer',[CustomerController::class, 'index']);
Route::get('v1/customer/{id}',[CustomerController::class, 'show']);

route::post('v1/customer', [CustomerController::class, 'store']);

route::patch('v1/customer/{id}', [CustomerController::class, 'update']);

route::delete('v1/customer/{id}', [CustomerController::class, 'delete']);
