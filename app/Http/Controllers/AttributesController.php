<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\ProductAttribute;


class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attrs = Attribute::all();
        return view('attributepages.attributes')->with('attrs', $attrs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $rowWithexistingName = Attribute::where('ATTRIBUTE_name', $request->input('name'))->get();
        if (count($rowWithexistingName) <= 0) { 
            $attr = new Attribute();
            $attr->ATTRIBUTE_name = $request->input('name');
            $attr->save();
            return redirect('/attributes')->with('success', 'Attribute Added.');
        }else{
            return redirect('/attributes')->with('error', 'Attribute Exists Already.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $name = $request->input('name');
        $rowWithexistingName = Attribute::where('ATTRIBUTE_name', $name)->get();
        if (count($rowWithexistingName) <= 1) { 
            $rowWithexistingName = Attribute::find($id);
            $rowWithexistingName->ATTRIBUTE_name = $request->input('name');
            $rowWithexistingName->save();
            return redirect('/attributes')->with('success', 'Attribute Edited.');
        }else{
            return redirect('/attributes')->with('error', 'Attribute name taken.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr = Attribute::find($id);
        //$relation = $attr->products();
        $product_attrs = ProductAttribute::where('ATTRIBUTE_id', $id);
        foreach($product_attrs as $product_attr){
            $product_attr->delete();
        }
        $attr->delete();
        return redirect('/attributes')->with('success', 'attribute removed.');
    }
}
