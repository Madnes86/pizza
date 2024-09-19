<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\dishes;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

  public function index()
  {
    // $pizzas = [
    //   ['id' => uniqid(), 'image' => '/assets/collect.png', 'title' => 'Комбо сбор', 'components' => 'На ваш выбор', 'price' => 290],
    //   ['id' => uniqid(), 'image' => '/assets/salami.png', 'title' => 'Салями', 'components' => 'Салями, Моцарелла, Томатный соус', 'price' => 250],
    //   ['id' => uniqid(), 'image' => '/assets/barbeque.png', 'title' => 'Барбекю', 'components' => 'Соус барбекю, Буженина, Бекон, Моцарелла, Болгарский перец, Помидоры, лук, Томатный соус', 'price' => 310],
    //   ['id' => uniqid(), 'image' => '/assets/margarita.png', 'title' => 'Маргарита', 'components' => 'Помидоры, Моцарелла, Томатный соус', 'price' => 290],
    //   ['id' => uniqid(), 'image' => '/assets/halal.png', 'title' => 'Халяль', 'components' => 'Говядина, Моцарелла, Картофель по деревенски, Болгарский перец, Черный перец, Грибы, Зира, Томатный соус', 'price' => 600],
    //   ['id' => uniqid(), 'image' => '/assets/philadelphia.png', 'title' => 'Филадельфия', 'components' => 'Лосось, сыр сливочный', 'price' => 599],
    //   ['id' => uniqid(), 'image' => '/assets/kapa-maki.png', 'title' => 'Капа маки', 'components' => 'Огурец, кунжут жареный', 'price' => 140],
    //   // другие пиццы
    // ];

    $pizzas = dishes::all();
    $basket_Ing = basket::all();
    

    return view('main', compact('pizzas','basket_Ing'));
  }


  // public function insert()
  // {
  //   $pizzas = [
  //     ['name'=>'name', 'image_path' => '/assets/collect.png', 'description' => 'Комбо сбор', 'ingredients' => 'На ваш выбор', 'price' => 290],
  //     ['name'=>'name', 'image_path' => '/assets/salami.png', 'description' => 'Салями', 'ingredients' => 'Салями, Моцарелла, Томатный соус', 'price' => 250],
  //     ['name'=>'name', 'image_path' => '/assets/barbeque.png', 'description' => 'Барбекю', 'ingredients' => 'Соус барбекю, Буженина, Бекон, Моцарелла, Болгарский перец, Помидоры, лук, Томатный соус', 'price' => 310],
  //     ['name'=>'name', 'image_path' => '/assets/margarita.png', 'description' => 'Маргарита', 'ingredients' => 'Помидоры, Моцарелла, Томатный соус', 'price' => 290],
  //     ['name'=>'name', 'image_path' => '/assets/halal.png', 'description' => 'Халяль', 'ingredients' => 'Говядина, Моцарелла, Картофель по деревенски, Болгарский перец, Черный перец, Грибы, Зира, Томатный соус', 'price' => 600],
  //     ['name'=>'name', 'image_path' => '/assets/philadelphia.png', 'description' => 'Филадельфия', 'ingredients' => 'Лосось, сыр сливочный', 'price' => 599],
  //     ['name'=>'name', 'image_path' => '/assets/kapa-maki.png', 'description' => 'Капа маки', 'ingredients' => 'Огурец, кунжут жареный', 'price' => 140],
  //     // другие пиццы
  //   ];
    
  //   foreach ($pizzas as $pizza) {
  //     dump($pizza);
  //       dishes::create([
  //           'name' => $pizza['name'],
  //           'image_path' => $pizza['image_path'],
  //           'description' => $pizza['description'],
  //           'price' => $pizza['price'],
  //           'ingredients' => 1
  //       ]);
  //     }
  // }
 
}
