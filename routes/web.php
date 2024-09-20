<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CuperController;
use App\Http\Controllers\KitchenController;

// Главная страница (пиццы)
Route::get('/', function () {
    return view('welcome');
});
Route::get('/order', function () {
    return view('order');
});
Route::middleware(['auth', 'verified'])->group(function () {


    // тут ещё должны быть 


});


Route::prefix('courier')->group(function () {
    Route::get('orders', [CuperController::class, 'index'])->name('courier.index');
    Route::post('orders/{id}/select', [CuperController::class, 'selectOrder'])->name('courier.selectOrder');
    Route::post('orders/{id}/confirm', [CuperController::class, 'confirmDelivery'])->name('courier.confirmDelivery');
    Route::post('orders/{id}/report', [CuperController::class, 'reportIssue'])->name('courier.reportIssue');
});

require __DIR__ . '/auth.php';