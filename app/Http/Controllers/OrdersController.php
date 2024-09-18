<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
  public function show()
  { 
    $pizzas = [
      ['id' => uniqid(), 'image' => '/assets/collect.png', 'title' => 'Комбо сбор', 'components' => 'На ваш выбор', 'price' => 359],
      ['id' => uniqid(), 'image' => '/assets/barbeque.png', 'title' => 'Барбекю', 'components' => 'Соус барбекю, Буженина, Бекон, Моцарелла, Болгарский перец, Помидоры, лук, Томатный соус', 'price' => 299],
      ['id' => uniqid(), 'image' => '/assets/margarita.png', 'title' => 'Маргарита', 'components' => 'Помидоры, Моцарелла, Томатный соус', 'price' => 299],
      // другие пиццы
    ];
    
    return view('orders', compact('pizzas'));
  }
}
