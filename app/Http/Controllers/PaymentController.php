<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PurchaseProduct;
use App\Payment;
use App\Handicraft;
use App\Merchant;
use App\Cart;
use App\CartItem;
use App\Product;
use App\Purchase;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Carbon\Carbon;
use Session;
use Auth;

class PaymentController extends Controller
{
    //controller for payment page
    public function getPayment(){
        return view('front.payment');
    }
    
    public function getPaymentResponse(){
        return view('front.fakepaymentresponse');
    }
    
    public function getUserInput(Request $request)
    {   
        //get user input
        $input = Input::get();
        
        $name = $input['name'];
        $email = $input['email'];
        $phone = $input['phone'];
        
        $productName = $input['productName'];
        $productPrice = $input['productPrice'];
        $quantity = $input['quantity'];
        
        $total = $input['total'];

        return view('front.fakepaymentresponse')->with('name',$name)->with('email', $email)->with('phone', $phone)->with('productName', $productName)->with('productPrice', $productPrice)->with('quantity', $quantity)->with('total', $total);
            
           /* return view('front.fakepaymentresponse')->with('name',$name)->with('email', $email)->with('phone', $phone)->with('productName[]', $productName)->with('productPrice[]', $productPrice)->with('quantity[]', $quantity)->with('total', $total)->with($arrData[]);*/
    
    
    
        return view('front.fakepaymentresponse')->with('name',$name)->with('email', $email)->with('phone', $phone)->with('productName', $productName)->with('productPrice', $productPrice)->with('quantity', $quantity)->with('total', $total);
    }
    
    public function getProductDetails(Request $request)
    {
        
        //get payment data from hidden input
        $productName = $request->input('productName');
        $productPrice = $request->input('productPrice');
        $quantity = $request->input('quantity');
        $total = $request->input('total');
        
        return view('front.payment')->with('productName',$productName)->with('productPrice',$productPrice)->with('quantity',$quantity)->with('total',$total);
    }
    
    public function getPaymentDetails(Request $request)
    {
        $total = $request->input('total');
        $quantity = $request->input('quantity');

        //generate purchase data (RefNo) in database when click submit button
        $oldCartDetails = Session::get('cartItem');
        $newCartDetails = new Cart($oldCartDetails);
        $generatePurchase = DB::table('purchase')->insertGetId(array(
                                            'userID'=> Auth::check() ? Auth::user()->id : 'Account', //insert current user ID
                                            'purchaseDate'=> Carbon::now(),                          //insert current date
                                            'purchaseAmount'=> $total                                //insert cart total amount
                                            ));
        //get RefNo
        $purchase = DB::table('purchase')->max('RefNo');
        
        //get productID
        $product = DB::table('cart_items')->value('ProductID');

        //generate purchasedproduct on database when click submit button
        $generatePuchasedProduct = DB::table('purchaseproduct')->insert([
                                            ['RefNo'=> $purchase, 'productID'=> $product, 'purchaseQuantity'=> $quantity]  
                                            ]);
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        
        //get store details that the user purchased from
        $stores = DB::table('stores')->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        
        //generate payment data in database when click submit button
        $generatePayment = DB::table('payment')->insertGetId(array(
                                            'paymentDate'=> Carbon::now(),          //insert current date
                                            'RefNo'=> $purchase,                    //insert RefNo
                                            'amount'=> $total,                       //insert amount
                                            'currency'=> "MYR"                      //insert currency
                                            ));
        
        //get payment ID
        $payment = DB::table('payment')->get();
        

        //for request.php
        return view('front.fakepaymentresponse', ['merchant' => $merchant, 'payment' => $payment, 'purchase'=> $purchase, 'stores' => $stores]);
    }
    
    
    public function responsePage(Request $request){
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        //for response.php    
        return view('/payment.response', ['merchant' => $merchant, 'payment' => $payment]);
        }

        

    public function Ipay88Page(Request $request){
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        //for Ipay88.class.php   
        return view('/payment.Ipay88', ['merchant' => $merchant, 'payment' => $payment]);
        }
    
    
    public function requeryPage(Request $request){
        
        //get merchant code that the user purchased from
        $merchant = DB::table('merchant')->join('stores', 'merchant.merchantID', '=', 'stores.merchantID')
                                         ->join('products', 'stores.id', '=', 'products.storeID')
                                         ->join('purchaseproduct', 'products.id', '=', 'purchaseproduct.productID')
                                         ->join('payment', 'purchaseproduct.RefNo', '=', 'payment.RefNo')->get();
        //get RefNo
        $purchase = DB::table('purchase')->max('RefNo');
         
        //get total amount
        $total = $request->input('total');
            
        return view('/payment.requery', ['merchant' => $merchant, 'purchase' => $purchase, 'total' => $total]);
        }
    
    

}
    /* public function postPaymentDetails(Request $request)
    {    
        $input = Input::get();
        
        $number = 0;
        $keystring = "key" . $number;
        $valstring = "val" . $number;
        
        while($input[$keystring]!=null){
            ${"key" . $number} = $input[$keystring];
            ${"val" . $number} = $input[$valstring];
            $number+=1;
            $keystring = "key" . $number;
            $valstring = "val" . $number;
            
        }
             return redirect('dashboard')->with('status', 'Profile updated!');

        /*return redirect('https://www.mobile88.com/epayment/entry.asp')->with($key0,$val0)->with($key1,$val1)->with($key2,$val2)->with($key3,$val3)->with($key4,$val4)->with($key5,$val5)->with($key6,$val6)->with($key7,$val7)->with($key8,$val8)->with($key9,$val9)->with($key10,$val10)->with($key11,$val11)->with($key12,$val12);
         
         return redirect('https://www.mobile88.com/epayment/entry.asp')->with($keystring0,$valstring0)->with($keystring1,$valstring1)->with($keystring2,$valstring2)->with($keystring3,$valstring3)->with($keystring4,$valstring4)->with($keystring5,$valstring5)->with($keystring6,$valstring6)->with($keystring7,$valstring7)->with($keystring8,$valstring8)->with($keystring9,$valstring9)->with($keystring10,$valstring10)->with($keystring11,$valstring11)->with($keystring12,$valstring);
    }*/
