<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    public $primaryKey = 'SALES_id';
    public $timestamps = true;
    public $incrementing = false;
    
    //Relationships
    // => BRAND
    public function brand(){
        return $this->belongsTo('App\Brand', 'BRAND_id');
    }
}
