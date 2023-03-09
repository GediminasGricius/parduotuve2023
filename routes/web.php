<?php

use App\Http\Controllers\OrderController;
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
    return view('welcome');
});

Auth::routes();

Route::resource("orders", OrderController::class);
Route::post("orders/{id}/addProduct", [OrderController::class, "addProduct"])->name("orders.addProduct");
Route::get("orders/{id}/deleteProduct/{productId}", [OrderController::class, "deleteProduct"])->name("orders.deleteProduct");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
