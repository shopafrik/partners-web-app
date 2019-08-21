<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    public $primaryKey = 'USER_id';
    public $timestamps = true;
    public $incrementing = false;
    
    //Relationships
    // => USER
    public function user(){
        return $this->belongsTo('App\User', 'USER_id');
    }
    // => ORDER
    public function orders(){
        return $this->belongToMany('App\Order', 'order_brands');
    }
    // => SALE
    public function sales(){
        return $this->hasMany('App\Sale', 'BRAND_id');
    }
}
