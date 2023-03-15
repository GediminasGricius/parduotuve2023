<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("products.index");
});

Auth::routes();

Route::resource("orders", OrderController::class);
Route::post("orders/{id}/addProduct", [OrderController::class, "addProduct"])->name("orders.addProduct");
Route::get("orders/{id}/deleteProduct/{productId}", [OrderController::class, "deleteProduct"])->name("orders.deleteProduct");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("products", ProductController::class);


Route::get('/pdf/{file}', [PdfController::class, 'getPdf'])->middleware('auth')->name('pdf.get');

Route::get('/testemail', function (){
    \Illuminate\Support\Facades\Mail::send(['text'=>'email.test'], [], function($message){
        $message->to("vr.ku.lt@gmail.com")->subject("Jus laimejote rinkimus")->from("bit@poligonas.lt");
    });
});
