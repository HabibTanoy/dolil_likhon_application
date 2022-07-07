<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolilDetailsController;

//Route::get('/test', function (Request $request) {
//    $files = Storage::disk("google")->allFiles();
//    $file_name = $files[0];
//    $details = Storage::disk('google')->getMetadata($file_name);
//    $url = Storage::disk('google')->url($file_name);
//    dd($url);
//    return view('welcome');
//});
//Route::post('/upload', function (Request $request) {
//    $file_name = $request->file('test')->getClientOriginalName();
//    Storage::disk("google")->putFileAs("", $request->file("test"), $file_name);
//})->name("upload");

Auth::routes();
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DolilDetailsController::class, 'home'])->name('dashboard');
    Route::get('/create', [DolilDetailsController::class, 'create'])->name('dolil-create');
    Route::post('/dolil-store', [DolilDetailsController::class, 'store'])->name('dolil-store');
    Route::get('/dolil-list', [DolilDetailsController::class, 'index'])->name('dolil-list');
    Route::get('/dolil/{id}/edit', [DolilDetailsController::class, 'edit'])->name('dolil-edit');
    Route::post('/dolil/{id}', [DolilDetailsController::class, 'update'])->name('dolil-update');
    Route::get('/dolil/{id}/delete', [DolilDetailsController::class, 'destroy'])->name('dolil-delete');
});

