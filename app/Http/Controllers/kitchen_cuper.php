<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\basket;

use function Laravel\Prompts\alert;

class kitchen_cuper extends Controller
{
    public function kitchen_done ()
    {
        
        $basket = basket::all();
      
     
        
        foreach ($basket as $bas){
        $id = $bas['id'];
         basket::where('id',$id)->update(array('status'=>'kitchen_done'));
    
        
        }
        return redirect('/kitchen');
    }
    public function cuper_cach ()
    {   
        
        $basket = basket::all();
        $i = 0;
        foreach ($basket as $bas){
            if(!($bas['status'] == 'kitchen_done')){
                $i++;
            }
        }

        if ($i == 0){
            dump('kitchen_done');
            foreach ($basket as $bas){
                $id = $bas['id'];
                 basket::where('id',$id)->update(array('status'=>'delivery'));
            
            
                }
              
        }
        else
        {
            alert('кухня еще не сделала заказ');
            
        }
        return redirect('/cuper');
        

    }
    public function cuper_done ()
    {   
        
        $basket = basket::query()->delete();
        return redirect('/cuper');
      
        

    }
}
