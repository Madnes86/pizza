<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CuperController extends Controller
{
  public function index()
  {
    
    return view('cuper');
  }
}