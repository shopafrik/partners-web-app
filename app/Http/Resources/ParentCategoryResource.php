<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\ParentCategory;
use App\Category;
use App\SubCategory;

class ParentCategoryResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'data' => $this->collection
        ];
    }
    //You can add data to what you return
    public function with($request){
        
        return [
            'version' => '1.0.0',
            'website' => url('http://shopafrik.com')
        ];
    }
}
