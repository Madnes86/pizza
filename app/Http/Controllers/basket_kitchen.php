<?php

namespace App\Http\Controllers;

use App\Models\basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\String\b;

class basket_kitchen extends Controller
{
 public function update()
 {
   
    $basket = basket::all();
    foreach ($basket as $bas){
    $id = $bas['id'];
     basket::where('id',$id)->update(array('status'=>'kitchen'));


    }
    // foreach ($basket as $bas)
    // {
    //     DB::table('basket')->
        
    
    //     basket::create([
    //           'name' => $bas['name'],
    //           'image_path' => $bas['image_path'],
    //           'description' => $bas['description'],
    //           'price' => $bas['price'],
    //           'status' =>'kitchen',
    //           'ingredients' => 1
    //                   ]);   
    // }
    return redirect('/orders');
 }
 
}
