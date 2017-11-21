<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  protected $fillable = ['storeName','storeDesc','storeAddress','image','storeRepresentative','representativeNum','representativeEmail','merchantID'];
  public function Product(){
      return $this->hasMany(Product::class);
  }
    
   public function Merchant(){
      return $this->belongsto(Merchant::class);
  }  
    
  public function User(){
  return $this->belongsto('App\User', 'userid');
  }
}
