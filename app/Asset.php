<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    public $primaryKey = 'ASSET_id';
    public $timestamps = true;
    //Relationships
    // => PRODUCT
    public function product(){
        return $this->belongTo('App\Product');
    }
}
