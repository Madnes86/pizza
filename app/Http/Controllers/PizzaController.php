<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Dish::all(); // Получение всех пицц
        return view('pizza.index', compact('pizzas'));
    }

    public function create()
    {
        return view('pizza.create'); // Форма создания пиццы
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image_path' => 'nullable|string',
        ]);

        Dish::create($request->all()); // Создание новой пиццы

        return redirect()->route('pizza.index')->with('success', 'Пицца добавлена');
    }

    public function edit(Dish $pizza)
    {
        return view('pizza.edit', compact('pizza')); // Форма редактирования пиццы
    }

    public function update(Request $request, Dish $pizza)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image_path' => 'nullable|string',
        ]);

        $pizza->update($request->all()); // Обновление данных пиццы

        return redirect()->route('pizza.index')->with('success', 'Пицца обновлена');
    }

    public function destroy(Dish $pizza)
    {
        $pizza->delete(); // Удаление пиццы

        return redirect()->route('pizza.index')->with('success', 'Пицца удалена');
    }
}
