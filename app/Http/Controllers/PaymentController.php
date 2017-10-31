<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //controller for payment page
 public function payment(){
        return view('payment.blade.php');
    }
}
