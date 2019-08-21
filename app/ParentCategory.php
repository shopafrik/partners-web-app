<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
     //Setting ID here
    //Setting relationships here
    //Setting table name
    protected $table = 'parent_categories';
    //Changing primary key fiels
    public $primaryKey = 'PC_id';
    //Timestamps
    public $timestamps = true;
    //RELATIONSHIPS =========================================
    //Relationship with ParentCategory
    //This means that a category has a relationship with a ParentCategory
    //And the relationship is: this category belongs to a ParentCategory.
    public function categories(){
        return $this->hasMany('App\Category', 'PC_id');
    }
}
