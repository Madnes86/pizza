<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pay extends Controller
{
    public function pay()
    {
        return redirect('/go/kitchen');
    }
}
