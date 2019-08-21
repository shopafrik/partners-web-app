<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $table = 'quantities';
    public $primaryKey = 'QUANTITY_id';
    public $timestamps = true;
    //Relationships
    // => PRODUCT
    public function product(){
        return $this->belongTo('App\Product');
    }
}
