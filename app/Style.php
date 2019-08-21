<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';
    public $primaryKey = 'STYLE_id';
    public $timestamps = true;

    //Relationships
    // => PRODUCT
    public function products(){
        return $this->hasMany('App\Product');
    }
}
