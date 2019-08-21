<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $primaryKey = 'PRODUCT_id';
    public $timestamps = true;

    //Relationships
    // => BRAND(USER)
    public function brand(){
        return $this->belongsTo('App\User', 'BRAND_id');
    }
    // => SHIPPING
    public function shipping(){
        return $this->hasOne('App\Shipping', 'PRODUCT_id');
    }
    // => SPEC
    public function specs(){
        return $this->hasMany('App\Spec');
    }
    // => PRICING
    public function pricing(){
        return $this->hasOne('App\Pricing', 'PRODUCT_id');
    }
    // => SUBCATEGORY
    public function subcategories()
    {
        return $this->belongsToMany('App\SubCategory', 'product_categories');
    }
    // => QUANTITY
    public function quantities(){
        return $this->hasMany('App\Quantity');
    }
    // => ASSET
    public function assets(){
        return $this->hasMany('App\Asset');
    }
    // => ATTRIBUTE
    public function attributes()
    {
        return $this->belongsToMany('App\Attribute', 'product_attributes');
    }
    // => CART/WISH (USERS)
    public function userscartswishlists()
    {
        return $this->belongsToMany('App\User', 'cart_wishlists');
    }
    // => ORDER
    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_products');
    }
    // => STYLE
    public function style(){
        return $this->belongsTo('App\Style');
    }
    // => OCCASION
    public function occasions()
    {
        return $this->belongsToMany('App\Occasion', 'product_occasions');
    }
    // => RANGE
    public function range(){
        return $this->belongsTo('App\Range');
    }
}
