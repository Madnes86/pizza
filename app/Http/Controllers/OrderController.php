<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use App\Models\OrderPosition;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Показать список всех заказов.
     */
    public function index()
    {
        $orders = Order::with('status')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Показать детали конкретного заказа.
     */
    public function showOrder($orderId)
    {
        $order = Order::with(['status', 'orderPositions.dish'])->findOrFail($orderId);
        return view('orders.show', compact('order'));
    }

    /**
     * Показать форму для создания нового заказа.
     */
    public function create()
    {
        $dishes = Dish::all();
        return view('orders.create', compact('dishes'));
    }

    /**
     * Сохранить новый заказ.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string',
            'delivery_time' => 'nullable|date',
            'dishes' => 'required|array',
            'dishes.*.id' => 'exists:dishes,id',
            'dishes.*.quantity' => 'required|integer|min:1',
        ]);

        // Создаем заказ
        $order = Order::create([
            'status_id' => Status::where('name', 'Новый')->first()->id,
            'address' => $request->address,
            'delivery_time' => $request->delivery_time,
            'comment' => $request->comment,
        ]);

        // Добавляем позиции к заказу
        foreach ($request->dishes as $dishData) {
            $dish = Dish::findOrFail($dishData['id']);
            OrderPosition::create([
                'order_id' => $order->id,
                'dish_id' => $dish->id,
                'price' => $dish->price,
                'quantity' => $dishData['quantity'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан');
    }

    /**
     * Показать форму для редактирования заказа.
     */
    public function edit($orderId)
    {
        $order = Order::with('orderPositions.dish')->findOrFail($orderId);
        $dishes = Dish::all();
        return view('orders.edit', compact('order', 'dishes'));
    }

    /**
     * Обновить заказ.
     */
    public function update(Request $request, $orderId)
    {
        $request->validate([
            'address' => 'required|string',
            'delivery_time' => 'nullable|date',
            'dishes' => 'required|array',
            'dishes.*.id' => 'exists:dishes,id',
            'dishes.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::findOrFail($orderId);
        $order->update([
            'address' => $request->address,
            'delivery_time' => $request->delivery_time,
            'comment' => $request->comment,
        ]);

        $order->orderPositions()->delete();
        foreach ($request->dishes as $dishData) {
            $dish = Dish::findOrFail($dishData['id']);
            OrderPosition::create([
                'order_id' => $order->id,
                'dish_id' => $dish->id,
                'price' => $dish->price,
                'quantity' => $dishData['quantity'],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен');
    }

    /**
     * Удалить заказ.
     */
    public function destroy($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален');
    }

    /**
     * Показать статическую страницу с пиццами.
     */
    public function show()
    { 
        $pizzas = [
            ['id' => uniqid(), 'image' => '/assets/collect.png', 'title' => 'Комбо сбор', 'components' => 'На ваш выбор', 'price' => 359],
            ['id' => uniqid(), 'image' => '/assets/barbeque.png', 'title' => 'Барбекю', 'components' => 'Соус барбекю, Буженина, Бекон, Моцарелла, Болгарский перец, Помидоры, лук, Томатный соус', 'price' => 299],
            ['id' => uniqid(), 'image' => '/assets/margarita.png', 'title' => 'Маргарита', 'components' => 'Помидоры, Моцарелла, Томатный соус', 'price' => 299],
            // другие пиццы
        ];
        
        return view('order', compact('pizzas'));
    }

    /**
     * Очистить список пицц.
     */
    public function clearPizzas()
    {
        $pizzas = []; // Очищаем массив
        return view('order', compact('pizzas'));
    }
}
