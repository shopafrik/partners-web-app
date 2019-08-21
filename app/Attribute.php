<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'attributes';
    public $primaryKey = 'ATTRIBUTE_id';
    public $timestamps = true;
    //Relationships
    // => PRODUCT
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_attributes');
    }

}
