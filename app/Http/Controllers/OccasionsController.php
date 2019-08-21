<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occasion;
use App\ProductOccasion;

class OccasionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occasions = Occasion::all();
        return view('occasionpages.occasions')->with('occasions', $occasions);
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
        $rowWithexistingName = Occasion::where('OCCASION_name', $request->input('name'))->get();
        if (count($rowWithexistingName) <= 0) { 
            $attr = new Occasion();
            $attr->OCCASION_name = $request->input('name');
            $attr->save();
            return redirect('/occasions')->with('success', 'Occasion Added.');
        }else{
            return redirect('/occasions')->with('error', 'Occasion Exists Already.');
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
        $rowWithexistingName = Occasion::where('OCCASION_name', $name)->get();
        if (count($rowWithexistingName) <= 1) { 
            $rowWithexistingName = Occasion::find($id);
            $rowWithexistingName->OCCASION_name = $request->input('name');
            $rowWithexistingName->save();
            return redirect('/occasions')->with('success', 'Occasion Edited.');
        }else{
            return redirect('/occasions')->with('error', 'Occasion name taken.');
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
        $occasion = Occasion::find($id);
        //$relation = $attr->products();
        $product_occasions = ProductOccasion::where('OCCASION_id', $id);
        foreach($product_occasions as $product_occasion){
            $product_occasion->delete();
        }
       
        $occasion->delete();
        return redirect('/occasions')->with('success', 'Occasion removed.');
    }
}
