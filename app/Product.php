<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productName','productDesc','productPrice','image','image','image','productQuantity','productQuantity','productCategory', 'productStatus', 'storeID'];
    
    public function Store(){
    return $this->belongsto('App\Store', 'storeID');
    }
    
    public function PurchaseProduct(){
        return $this->belongsto(PurchaseProduct::class);
    }
    
    public function merchant(){
        return $this->belongsto(Merchant::class);
    }
}
