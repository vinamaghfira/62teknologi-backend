<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Api\BusinessController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('business', [BusinessController::class, 'index']);
Route::post('business/create', [BusinessController::class, 'createBusiness']);
Route::put('business/update/{id}', [BusinessController::class, 'updateBusiness']);
Route::delete('business/delete/{id}', [BusinessController::class, 'destoryBusiness']);
