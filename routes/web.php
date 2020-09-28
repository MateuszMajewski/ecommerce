<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemInCartController;
use App\Http\Controllers\ProductController;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [CustomController::class, 'index']); // main page

//Route::get('category', [CategoryController::class, 'index']);
//Route::get('category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']); // show category page
//Route::get('/category/{id}/edit', [CategoryController::class, 'edit']); // show edit form
//Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

//Route::get('product', [ProductController::class, 'index']);
//Route::get('product/create', [ProductController::class, 'create']);
Route::post('product', [ProductController::class, 'store']);
Route::get('product/{id}', [ProductController::class, 'show']); // show product page
Route::get('/product/{id}/edit', [ProductController::class, 'edit']); // show edit form
Route::post('/product/{id}/update', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

Route::get('/cart', [CartController::class, 'index']); // show product page

Route::post('/itemincart/{id}', [ItemInCartController::class, 'store']);
Route::post('/itemincart/{id}/minus', [ItemInCartController::class, 'minus']);
Route::post('/itemincart/{id}/plus', [ItemInCartController::class, 'plus']);
Route::post('/itemincart/{id}/remove', [ItemInCartController::class, 'remove']);

Route::get('/order', [OrderController::class, 'index']); //order page
Route::post('/order', [OrderController::class, 'makeOrder']); // make order
Route::get('/order/test', [OrderController::class, 'test']); // do integracji z postem (cale zamowienie tworzone w poscie)

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/order/sucess/{id}', function(){return view('success');}); //order sucess

Route::get('/order/fail', function(){return view('fail');}); //order fail



