<?php

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

    

    // Страница Manager
    Route::get('/manager', [ManagerControllers::class, 'index'])->name('manager');

    //Сюда засовывать все роуты, где нужна авторизация и ролевка. Пока не определен никакой роут для логина = будет вылетать ошибка, что роут 'login' не определен, что логично.
    Route::middleware(['auth', 'verified'])->group(function () {
        //Так по групкам раскидывайте по пермишнам, тут она будет гиперпримитивная, как таковых ролей нет, есть пермишн на который все сажаете.
        Route::middleware(['can:access to kitchen panel'])->group(function () {
            // Страница Kitchen
            Route::get('/kitchen', [KitchenController::class, 'show'])->name('kitchen');
         });
});

//П.С у вас тут никакой коробочной авторизации нет, можете попробовать тот же Laravel breeze который вроде есть в мейне (если верить комиту Голошубина, в composer там не глядел)