<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $primaryKey = 'C_id';
    public $timestamps = true;
    //Relationship with ParentCategory
    //This means that a category has a relationship with a ParentCategory
    //And the relationship is: this category belongs to a ParentCategory.
    public function parentcategory(){
        return $this->belongsTo('App\ParentCategory', 'PC_id');
    }
    //Categories and SubCategories Relationship
    public function subcategories(){
        return $this->hasMany('App\Subcategory', 'C_id');
    }
}
