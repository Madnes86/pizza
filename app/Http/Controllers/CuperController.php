<?php

namespace App\Http\Controllers;

use App\Models\basket;
use App\Models\user_pizza;
use Illuminate\Http\Request;

class CuperController extends Controller
{
  public function index()
  {
    $basket = basket::all();
    try
    {
      $bas = $basket [0];
      $bas['status'];$users = user_pizza::where('id', 1)->get();
      $user = $users[0];
      return view('cuper', compact('user', 'bas'));

    }
    catch (\Throwable $th)
    {
      $bas =['status' => 'нет заказа', 'created_at' => '' ]; 
      $users = user_pizza::where('id', 2)->get();
      $user = $users[0];
      return view('cuper', compact('user', 'bas'));
    }
    
   
  }
}