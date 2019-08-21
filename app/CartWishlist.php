<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartWishlist extends Model
{
    protected $table = 'cart_wishlists';
    public $primaryKey = 'CW_id';
    public $timestamps = true;
    //Relationships
    // => USER
    public function user(){
        return $this->belongTo('App\User');
    }
}
