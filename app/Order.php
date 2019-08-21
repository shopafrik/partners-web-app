<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $primaryKey = 'ORDER_id';
    public $timestamps = true;
    //Relationships
    // => USER
    public function user(){
        return $this->belongTo('App\User');
    }
    // => PRODUCT
    public function products()
    {
        return $this->belongsToMany('App\Product', 'order_products');
    }
}
