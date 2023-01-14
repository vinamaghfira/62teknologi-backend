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

Route::prefix('business')->group(function () {

// --- Get Data Business
Route::get('get', [BusinessController::class, 'index']);

// --- Create Data Business
Route::post('create', [BusinessController::class, 'createBusiness']);

// --- Update Data Business
Route::put('update/{id}', [BusinessController::class, 'updateBusiness']);

// --- Get Delete Business
Route::delete('delete/{id}', [BusinessController::class, 'destoryBusiness']);

});
