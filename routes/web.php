<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CuperController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ManagerControllers;
use App\Http\Controllers\Orders;
use App\Http\Controllers\Basket_dish;
use App\Http\Controllers\Basket_kitchen;
use App\Http\Controllers\Pay;
use App\Http\Controllers\kitchen_cuper;
use App\Http\Controllers\Manager;   

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

Route::get('/pay',[pay::class,'pay']);

Route::get('/kitchen/done',[kitchen_cuper::class,'kitchen_done']);

Route::get('/cuper/cach',[kitchen_cuper::class,'cuper_cach']);

Route::get('/cuper/done',[kitchen_cuper::class,'cuper_done']);

    // Страница Manager
    Route::get('/manager', [ManagerControllers::class, 'index'])->name('manager');

    //Сюда засовывать все роуты, где нужна авторизация и ролевка. Пока не определен никакой роут для логина = будет вылетать ошибка, что роут 'login' не определен, что логично.
    Route::middleware(['auth', 'verified'])->group(function () {
        //Так по групкам раскидывайте по пермишнам, тут она будет гиперпримитивная, как таковых ролей нет, есть пермишн на который все сажаете.
        Route::middleware(['can:access to kitchen panel'])->group(function () {
            // Страница Kitchen
            Route::get('/kitchen', [KitchenController::class, 'show'])->name('kitchen');
         });

        Route::middleware(['can:access to manager panel'])->group(function () {
            // Страница Manager
            Route::get('/manager', [ManagerControllers::class, 'index'])->name('manager');
        });

        Route::middleware(['can:access to cuper panel'])->group(function () {
            // Страница Cuper
            Route::get('/cuper', [CuperController::class, 'index'])->name('cuper');
        }); 
        
});
Route::prefix('courier')->group(function () {
    Route::get('orders', [CuperController::class, 'index'])->name('courier.index');
    Route::post('orders/{id}/select', [CuperController::class, 'selectOrder'])->name('courier.selectOrder');
    Route::post('orders/{id}/confirm', [CuperController::class, 'confirmDelivery'])->name('courier.confirmDelivery');
    Route::post('orders/{id}/report', [CuperController::class, 'reportIssue'])->name('courier.reportIssue');
});