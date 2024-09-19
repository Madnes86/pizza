<?php

namespace App\Http\Controllers;

use App\Models\basket;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
  public function show()
  { 
    $pizzas = basket::where('status', 'kitchen' or 'status', 'done')->get();
    // dd($kitchen);
    
    
      
    
    return view('orders', compact('pizzas'));
  }
}
