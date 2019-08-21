<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Range;
use App\ProductRange;

class RangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranges = Range::all();
        return view('rangepages.ranges')->with('ranges', $ranges);
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
        $rowWithexistingName = Range::where('RANGES_name', $request->input('name'))->get();
        if (count($rowWithexistingName) <= 0) { 
            $range = new Range();
            $range->RANGES_name = $request->input('name');
            $range->save();
            return redirect('/ranges')->with('success', 'Range Added.');
        }else{
            return redirect('/ranges')->with('error', 'Range Exists.');
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
        $rowWithexistingName = Range::where('RANGES_name', $name)->get();
        if (count($rowWithexistingName) <= 1) { 
            
            $rowWithexistingName = Range::find($id);
            $rowWithexistingName->RANGES_name = $request->input('name');
            $rowWithexistingName->save();
            return redirect('/ranges')->with('success', 'Range Edited.');
        }else{
            return redirect('/ranges')->with('error', 'Range name taken.');
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
        $product_ranges = ProductRange::where('RANGES_id', $id);
        foreach($product_ranges as $product_range){
            $product_range->delete();
        }
        $range = Range::find($id);
        $range->delete();
        return redirect('/ranges')->with('error', 'range removed.');
    }
}
