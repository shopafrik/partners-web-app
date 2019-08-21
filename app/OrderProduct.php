<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';
    public $primaryKey = 'OP_id';
    public $timestamps = true;
    // //Relationships
    // // => PRODUCT
    // public function product(){
    //     return $this->belongTo('App\Product');
    // }
    // // => ORDER
    // public function order(){
    //     return $this->belongTo('App\Order');
    // }
}
