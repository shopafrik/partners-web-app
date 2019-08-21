<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $table = 'specs';
    public $primaryKey = 'SPEC_id';
    public $timestamps = true;
    //Relationships
    // => PRODUCT
    public function product(){
        return $this->belongTo('App\Product');
    }
}
