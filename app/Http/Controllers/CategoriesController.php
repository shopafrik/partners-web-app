<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\ParentCategory;
use App\Category;
use App\SubCategory;
//For APIS
use App\Http\Resources\ParentCategoryResource as PCResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categs = ParentCategory::orderBy('created_at', 'asc')->paginate(10);
        return view('/categorypages/parentcategories')->with('categs', $categs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pc = ParentCategory::find($id);
        //$categ = $pc->categories;
        return view('categorypages.parentcategory')->with('categ', $pc);
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
        // $this->validate($request, [
        //     'name' => 'required'
        // ]);
        // $name = $request->input('name');
        // $rowWithexistingName = Style::where('STYLE_name', $name)->get();
        // if (count($rowWithexistingName) <= 1) { 
            
        //     $rowWithexistingName = Style::find($id);
        //     $rowWithexistingName->STYLE_name = $request->input('name');
        //     $rowWithexistingName->save();
        //     return redirect('/styles')->with('success', 'Style Edited.');
        // }else{
        //     redirect('/styles')->with('error', 'style name taken.');
        // }
        return 'edited';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addcategory(Request $request, $id){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $categ = ParentCategory::find($id);
        
        $rowWithexistingName = Category::where('C_name', $request->input('name'))->get();
        if (count($rowWithexistingName) <= 0){
            $sc = new Category();
            $sc->C_name = $request->input('name');
            $sc->PC_id = $id;
            $sc->save();
            return redirect('/categories/'.$id)->with('success', 'Category Added.');
        }else{
            foreach($rowWithexistingName as $r){
                if ($r->PC_id == $id){
                    return redirect('/categories/'.$id)->with('error', 'Category already exists.');
                }
            }
            $sc = new Category();
            $sc->C_name = $request->input('name');
            $sc->PC_id = $id;
            $sc->save();
            return redirect('/categories/'.$id)->with('success', 'Category Added.');
        }
        
    }




    
    public function categorydetails($id){
        $c = Category::find($id);
        return view('categorypages.categorydetails')->with('categ', $c);
    }
    
    

    
    public function addsubcateg(Request $request, $id){
        $this->validate($request, [
            'name' => 'required'
        ]);
        $rowWithexistingName = SubCategory::where('SC_name', $request->input('name'))->get();

        if (count($rowWithexistingName) <= 0){
            $c = Category::find($id);
            $sc = new SubCategory();
            $sc->SC_name = $request->input('name');
            $sc->C_id = $id;
            $sc->save();
            return redirect('/categorydetails/'.$id)->with('success', 'Subcategory  Added.');
        }else{
            foreach($rowWithexistingName as $r){
                if ($r->C_id == $id){
                    return redirect('/categorydetails/'.$id)->with('error', 'Subcategory already exists.');
                }
            }
            $c = Category::find($id);
            $sc = new SubCategory();
            $sc->SC_name = $request->input('name');
            $sc->C_id = $id;
            $sc->save();
            return redirect('/categorydetails/'.$id)->with('success', 'Subcategory  Added.'); 
        }
    }






















    //APIS===================================================================================
    public function categoriesapi(){
        $categs = ParentCategory::all();//paginate(10);
        //return view('categorypages.categorydetails')->with('categ', $c);
        //return response()->json($categs);
        // $categs = ParentCategory::all()->toArray();
        // $categs = array_map(function($categ)
        // {
        //     $categ['categories'] = array_column($categ['categories'], 'PC_id');
        // });
        //return Response::json($categs);
        return new PCResource($categs);
    }

}
