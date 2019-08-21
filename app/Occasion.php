<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $table = 'occasions';
    public $primaryKey = 'OCCASION_id';
    public $timestamps = true;
    //Relationships
    // => PRODUCT
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_occasions');
    }
}
