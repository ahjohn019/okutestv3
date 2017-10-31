<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','desc','type','price'];

    public function scopeSearch($query, $s){
        return $query->where('name','like','%' .$s. '%');
    }
    
    public function admin(){
        return $this->belongsto(Admin::class);
    }
}
