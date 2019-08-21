<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Style;
use App\Product;
use App\SubCategory;

class StylesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $styles = Style::all();
        $categoriesArray = array(); 
        $stringCategs = '';
        foreach ($styles as $style){
            $belongsToCategs = json_decode($style->Style_belongs_to, true);
            foreach ($belongsToCategs as $c){
                $categ = SubCategory::find($c);
                $stringCategs = $stringCategs
                    .$categ->SC_name
                    .'->'
                    .$categ->category->parentcategory->PC_name
                    .' | ';
            }
            array_push($categoriesArray, $stringCategs);
            $stringCategs = '';
        }
        $data = [
            'styles' => $styles,
            'categs' => $categoriesArray
        ];
        return view('stylepages.styles')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategs = SubCategory::all();
        $data = [
            'subcategs' => $subcategs
        ];
        return view('stylepages.createstyle')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categsJSON = array();
        $subcategsInDB = SubCategory::all();
        $categcheckbox = $request->input('subcategs');
        foreach($categcheckbox as $cc){
            array_push($categsJSON, $subcategsInDB[$cc-1]->SC_id);
        }
        //return $categs;




        $this->validate($request, [
            'name' => 'required'
        ]);
        $rowWithexistingName = Style::where('STYLE_name', $request->input('name'))->get();
        if (count($rowWithexistingName) <= 0) { 
            $style = new Style();
            $style->STYLE_name = $request->input('name');
            $style->Style_belongs_to = json_encode($categsJSON);
            $style->save();
            return redirect('/styles')->with('success', 'Style Added.');
        }else{
            return redirect('/styles')->with('error', 'Style Exists.');
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
        $rowWithexistingName = Style::where('STYLE_name', $name)->get();
        if (count($rowWithexistingName) <= 1) { 
            
            $rowWithexistingName = Style::find($id);
            $rowWithexistingName->STYLE_name = $request->input('name');
            $rowWithexistingName->save();
            return redirect('/styles')->with('success', 'Style Edited.');
        }else{
            return redirect('/styles')->with('error', 'style name taken.');
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
        $products = Product::where('STYLE_id', $id);
        foreach($products as $product){
            $product->STYLE_id = NULL;
            $product->save();
        }
        $style = Style::find($id);
        $style->delete();
        return redirect('/styles')->with('error', 'style removed.');
    }
}
