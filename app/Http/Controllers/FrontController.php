<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.marketmain');
    }
    
    public function master()
    {
        return view('master.marketmenu');
    }

     
}
