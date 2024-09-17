<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CuperController;
use App\Http\Controllers\KitchenController;

// Главная страница (пиццы)
Route::get('/', [PizzaController::class, 'index'])->name('main');

// Страница заказа
Route::get('/order', [OrderController::class, 'show'])->name('order');
Route::post('/order/clear', [OrderController::class, 'clearPizzas']);

// Страница со списком заказов
Route::get('/orders', [OrderController::class, 'list'])->name('orders');

// Страница Cuper
Route::get('/cuper', [CuperController::class, 'index'])->name('cuper');

// Страница Kitchen
Route::get('/kitchen', [KitchenController::class, 'index'])->name('kitchen');