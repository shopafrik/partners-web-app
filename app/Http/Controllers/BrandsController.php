<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'asc')->paginate(10);
        $data = [
            'brands' => $brands,
            'title' => "All Brands"
        ];
        return view('/brandpages/brands')->with('data', $data);
    }

    public function pendingbrands(){
        $brands = Brand::orderBy('created_at', 'asc')->where('BRAND_application_status','p')->paginate(10);
        $data = [
            'brands' => $brands,
            'title' => "Pending Brands"
        ];
        return view('/brandpages/brands')->with('data', $data);
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
        $brand = Brand::find($id);
        if ($brand->BRAND_application_status == 'a'){
            $brand->BRAND_application_status = 'p';
            $brand->save();
            return redirect('/brands')->with('success', 'Brand\'s Application set to Pending.');
        }else{
            $brand->BRAND_application_status = 'a';
            $brand->save();
            return redirect('/brands')->with('success', 'Brand Approved.');
        }
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
}
