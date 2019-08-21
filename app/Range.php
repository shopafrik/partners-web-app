<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    protected $table = 'ranges';
    public $primaryKey = 'RANGES_id';
    public $timestamps = true;

    //Relationships
    // => PRODUCT
    public function products(){
        return $this->hasMany('App\Product');
    }
}
