<?php

namespace App\Http\Controllers;

use App\Models\basket;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show()
    { 
      $pizzas = basket::where('status','basket')->get();
      $summ = basket::where('status','basket')->sum('price');
      return view('order', compact('pizzas' ,'summ'));
    }


    public function clearPizzas()
    {
       // Очищаем массив
       $pizzas = basket::query()->delete();
      return redirect('/');
    }
}
