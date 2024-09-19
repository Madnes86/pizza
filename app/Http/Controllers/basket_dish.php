<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\dishes;
use Illuminate\Http\Request;

class basket_dish extends Controller
{

    
    // Добавление пиццы в корзину




    public function add_bsk( $request)
    {
        $dish = dishes::find($request );
        // dd($dish, $request);
        basket::create([
            'name' => $dish->name,
            'image_path' => $dish->image_path,
            'description' => $dish->description,
            'price' => $dish->price,
            'ingredients' => $dish->ingredients  
        ]);

        return redirect('/');
    }
    public function clearPizzas()
 {
    // Очищаем массив
    $pizzas = basket::query()->delete();
   return redirect('/');
 }

}
