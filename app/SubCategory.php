<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    public $primaryKey = 'SC_id';
    public $timestamps = true;
    //Relationships
    // => CATEGORY
    public function category(){
        return $this->belongsTo('App\Category', 'C_id');
    }
    // => PRODUCT
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_categories');
    }
}
