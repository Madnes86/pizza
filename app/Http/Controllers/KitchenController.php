<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ConfirmPreparationRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\basket;
use App\Models\dishes;

class KitchenController extends Controller

{


    public function show()
    {
      
     
  
      $pizzas = basket::where('status', 'kitchen')->get();
      // dd($kitchen);
      
        return view('kitchen', compact('pizzas'));
        
          
      
    }
  
  
  
    public function __construct()
    {
        $this->middleware('auth:kitchen');
        $this->middleware(function ($request, $next) {
            // Проверка прав доступа к действиям контроллера
            Gate::authorize('access-kitchen');
            return $next($request);
        });
    }

    /**
     * Показать список заказов, поступивших на приготовление.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with('status') // Загрузка статусов вместе с заказами
                        ->where('status_id', Status::where('name', 'Ожидает приготовления')->first()->id)
                        ->get();
        return view('kitchen.orders.index', compact('orders'));
    }

    /**
     * Показать форму для начала приготовления заказа.
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
    public function startPreparation($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('kitchen.orders.start', compact('order'));
    }

    /**
     * Подтвердить начало приготовления заказа.
     *
     * @param \App\Http\Requests\ConfirmPreparationRequest $request
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmPreparation(ConfirmPreparationRequest $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status_id = Status::where('name', 'В процессе приготовления')->first()->id;
        $order->save();

        return redirect()->route('kitchen.orders.index')->with('success', 'Приготовление заказа начато.');
    }

    /**
     * Показать форму для изменения статуса заказа на "Ожидает курьера".
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
    public function readyForCourier($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('kitchen.orders.ready', compact('order'));
    }

    /**
     * Обновить статус заказа на "Ожидает курьера".
     *
     * @param \App\Http\Requests\UpdateStatusRequest $request
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateToAwaitingCourier(UpdateStatusRequest $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status_id = Status::where('name', 'Ожидает курьера')->first()->id;
        $order->save();

        return redirect()->route('kitchen.orders.index')->with('success', 'Статус заказа изменен на "Ожидает курьера".');
    }

    /**
     * Показать детали заказа и подтвердить передачу курьеру.
     *
     * @param int $orderId
     * @return \Illuminate\View\View
     */
    public function confirmHandoff($orderId)
    {
        $order = Order::with('courier')->findOrFail($orderId); // Жадная загрузка курьера
        return view('kitchen.orders.handoff', compact('order'));
    }

    /**
     * Подтвердить передачу заказа курьеру.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $orderId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handoffToCourier(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status_id = Status::where('name', 'Передан курьеру')->first()->id;
        $order->save();

        return redirect()->route('kitchen.orders.index')->with('success', 'Заказ передан курьеру.');
    }
}
