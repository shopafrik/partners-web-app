<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
//use App\Http\Controllers\Input;
//use Illuminate\Support\Facades\Request;



use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Brand;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/userpages/users');
    }

    public function profile()
    {
        return view('/userpages/profile');
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
        $user = User::find($id);
        return view('/userpages/editprofile')->with('user', $user);
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
            'name' => 'required',
            'email' => ['required', 'string', 'email']
        ]);

        $user = User::find($id);
        if (!($user->USER_email == $request->input('email'))){
            $checkEmail = User::where('USER_email', $request->input('email'))->get();
            if (count($checkEmail) <= 0){
                $user->USER_email = $request->input('email');
            }
            else{
                return view('/userpages/profile')->with('error', 'The Email has already been taken.');
            }
        }
        $user->USER_name = $request->input('name');
        if (!is_null($request->input('phone'))){ $user->USER_phone = $request->input('phone'); }
        $brand = Brand::find($id);
        if (!is_null($request->input('description'))){ $brand->BRAND_description = $request->input('description'); }
        
        //LOGO ==============================================================================================================
        if($request->hasFile('logo_image')){
            
            //get filename with extension
            $filenamewithextension = $request->file('logo_image')->getClientOriginalName();
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file('logo_image')->getClientOriginalExtension();
            //filename to store
            $filenametostore = $id.'/logo/'.$filename.'_'.time().'.'.$extension;
            //delete existing logo
            Storage::disk('s3brandbucket')->deleteDirectory('/'.$id.'/logo/');
            //Upload File to s3
            Storage::disk('s3brandbucket')->put($filenametostore, fopen($request->file('logo_image'), 'r+'), 'public');
            //Store $filenametostore in the database
            $brand->BRAND_logo_pic_link = $filenametostore;
        }//profile_image
        $user->save();
        $brand->save();
        return view('/userpages/profile')->with('success', 'Profile Updated');
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
