<?php

use App\Http\Controllers\basket_dish;
use App\Http\Controllers\basket_kitchen;
use App\Http\Controllers\BD_us;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CuperController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ManagerControllers;
use App\Http\Controllers\Orders;

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

Route::get('/add/basket/{request}', [basket_dish::class, 'add_bsk']);

Route::get('/add_dish', [PizzaController::class, 'insert']);

Route::get('/go/kitchen',[basket_kitchen::class, 'update']);
