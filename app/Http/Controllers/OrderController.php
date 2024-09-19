<?php

namespace App\Http\Controllers;

use App\Models\basket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    { 
      $pizzas = basket::where('status','basket')->get();
      dump($pizzas);
      return view('order', compact('pizzas'));
    }


    public function clearPizzas()
    {
       // Очищаем массив
       $pizzas = basket::query()->delete();
      return redirect('/');
    }
}
