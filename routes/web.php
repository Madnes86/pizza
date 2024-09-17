<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CuperController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ManagerControllers;

// Главная страница (пиццы)
Route::get('/', [PizzaController::class, 'index'])->name('main');

// Страница заказа
Route::get('/order', [OrderController::class, 'show'])->name('order');
Route::post('/order/clear', [OrderController::class, 'clearPizzas']);

// Страница заказов
Route::get('/orders', [OrdersController::class, 'show'])->name('orders');

// Страница Cuper
Route::get('/cuper', [CuperController::class, 'index'])->name('cuper');

// Страница Kitchen
Route::get('/kitchen', [KitchenController::class, 'show'])->name('kitchen');

// Страница Manager
Route::get('/manager', [ManagerControllers::class, 'index'])->name('manager');