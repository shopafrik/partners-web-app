<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricings';
    public $primaryKey = 'PRODUCT_id';
    public $timestamps = true;
}
