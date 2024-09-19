<?php 

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\dishes;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
  public function show()
  {
    
   

    $pizzas = basket::where('status', 'kitchen')->get();
    // dd($kitchen);
    
      return view('kitchen', compact('pizzas'));
      
        
    
  }
}