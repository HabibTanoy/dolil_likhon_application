<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolilDetailsController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/dolil-store', [DolilDetailsController::class, 'store']);
Route::get('/search-dolil', [DolilDetailsController::class, 'search_dolil']);
Route::put('/update/{id}', [DolilDetailsController::class, 'update']);
Route::delete('/delete/{id}', [DolilDetailsController::class, 'destroy']);
