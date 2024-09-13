<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{

  public function index()
  {
    $pizzas = [
      ['id' => uniqid(), 'image' => '/assets/collect.png', 'title' => 'Комбо сбор', 'components' => 'На ваш выбор', 'price' => 359],
      ['id' => uniqid(), 'image' => '/assets/salami.png', 'title' => 'Салями', 'components' => 'Салями, Моцарелла, Томатный соус', 'price' => 359],
      ['id' => uniqid(), 'image' => '/assets/barbeque.png', 'title' => 'Барбекю', 'components' => 'Соус барбекю, Буженина, Бекон, Моцарелла, Болгарский перец, Помидоры, лук, Томатный соус', 'price' => 299],
      ['id' => uniqid(), 'image' => '/assets/margarita.png', 'title' => 'Маргарита', 'components' => 'Помидоры, Моцарелла, Томатный соус', 'price' => 299],
      ['id' => uniqid(), 'image' => '/assets/halal.png', 'title' => 'Халяль', 'components' => 'Говядина, Моцарелла, Картофель по деревенски, Болгарский перец, Черный перец, Грибы, Зира, Томатный соус', 'price' => 299],
      // другие пиццы
    ];

    return view('main', compact('pizzas'));
  }
}
