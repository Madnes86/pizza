<?php 

namespace App\Http\Controllers;

use App\Models\dishes;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
  public function show()
  {
    
    $pizzas = dishes::all();
    $status =$pizzas -> status;
    $kitchen = dishes::where('status', 'kitchen')->get();
    if ($status == 'kitchen') {
      return view('kitchen', compact('kitchen'));
      
    }
    
  }
}