<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = ['name','desc','start_date','end_date','place','type'];//

    public function scopeSearch($query, $s){
        return $query->where('name','like','%' .$s. '%');
    }
    
    public function admin(){
        return $this->belongsto(Admin::class);
    }

    public function organization(){
        return $this->belongsto('App\Organization','org_id');
    }

}
