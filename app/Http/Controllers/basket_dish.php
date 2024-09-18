<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\dishes;
use Illuminate\Http\Request;

class basket_dish extends Controller
{

    
    // Добавление пиццы в корзину




    public function add_bsk(Request $request)
    {
        $dish = dishes::find(1);
        dump($dish);
        basket::create([
            'name' => $dish->name,
            'image_path' => $dish->image_path,
            'description' => $dish->description,
            'price' => $dish->price,
            'ingredients' => $dish->ingredients  
        ]);

        return redirect('/');
    }

}
