<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Models\Issue;
use Illuminate\Support\Facades\Log;
use App\Models\basket;
use App\Models\user_pizza;

class CuperController extends Controller
{
    // Метод для просмотра заказов, которые находятся на кухне
    
  public function index_()
  {
    $basket = basket::all();
    try
    {
      $bas = $basket [0];
      $bas['status'];$users = user_pizza::where('id', 1)->get();
      $user = $users[0];
      return view('cuper', compact('user', 'bas'));

    }
    catch (\Throwable $th)
    {
      $bas =['status' => 'нет заказа', 'created_at' => '' ]; 
      $users = user_pizza::where('id', 2)->get();
      $user = $users[0];
      return view('cuper', compact('user', 'bas'));
    }
  }


    public function index()
    {
        try {
            // Получаем ID статуса "На кухне"
            $kitchenStatusId = Status::where('name', 'На кухне')->firstOrFail()->id;
            $orders = Order::where('status_id', $kitchenStatusId)->get();
        } catch (\Exception $e) {
            Log::error('Ошибка при получении заказов на кухне: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при получении заказов.');
        }

        return view('courier.orders', compact('orders'));
    }

    // Метод для выбора заказа на доставку
    public function selectOrder($id)
    {
        try {
            $order = Order::findOrFail($id);

            // Получаем ID статуса "На кухне"
            $kitchenStatusId = Status::where('name', 'На кухне')->firstOrFail()->id;

            // Проверяем, что статус заказа "На кухне"
            if ($order->status_id != $kitchenStatusId) {
                return redirect()->back()->with('error', 'Этот заказ уже не на кухне.');
            }

            // Обновляем статус заказа на "Ожидает курьера"
            $awaitingCourierStatusId = Status::where('name', 'Ожидает курьера')->firstOrFail()->id;
            $order->status_id = $awaitingCourierStatusId;
            $order->save();

            // Логируем успешное действие
            Log::info('Заказ выбран для доставки: ID ' . $order->id);

            return redirect()->route('cuper.index')->with('success', 'Заказ выбран для доставки.');
        } catch (\Exception $e) {
            Log::error('Ошибка при выборе заказа: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при выборе заказа.');
        }
    }

    // Метод для подтверждения передачи заказа курьеру
    public function confirmDelivery($id)
    {
        try {
            $order = Order::findOrFail($id);

            // Получаем ID статуса "Доставлен"
            $deliveredStatusId = Status::where('name', 'Доставлен')->firstOrFail()->id;
            $order->status_id = $deliveredStatusId;
            $order->save();

            // Логируем успешное действие
            Log::info('Заказ доставлен: ID ' . $order->id);

            // Логика для уведомления менеджера может быть добавлена здесь

            return redirect()->route('cuper.index')->with('success', 'Заказ доставлен.');
        } catch (\Exception $e) {
            Log::error('Ошибка при подтверждении доставки: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при подтверждении доставки.');
        }
    }

    // Метод для сообщения менеджеру о проблемах
    public function reportIssue(Request $request, $id)
    {
        // Валидация входных данных
        $validated = $request->validate([
            'issue' => 'required|string|max:255',
        ]);

        try {
            $order = Order::findOrFail($id);

            // Создаем запись о проблеме
            Issue::create([
                'order_id' => $order->id,
                'issue' => $validated['issue'],
            ]);

            // Логируем успешное сообщение
            Log::info('Проблема с заказом сообщена менеджеру: ID ' . $order->id);

            // Логика для уведомления менеджера может быть добавлена здесь

            return redirect()->route('cuper.index')->with('success', 'Проблема с заказом сообщена менеджеру.');
        } catch (\Exception $e) {
            Log::error('Ошибка при сообщении о проблеме: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при сообщении о проблеме.');
        }
    }
}