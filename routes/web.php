<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolilDetailsController;
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

Route::post('/upload', function (Request $request) {
   dd($request->file('test'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//create update delete get trip
Route::get('/dolil', [DolilDetailsController::class, 'index']);
//Route::post('/dolil-store', [DolilDetailsController::class, 'store']);
//Route::get('/trips/{id}', [DolilDetailsController::class, 'show']);
//Route::put('/trips/{id}', [DolilDetailsController::class, 'update']);
//Route::delete('/trips/{id}', [DolilDetailsController::class, 'destroy']);
