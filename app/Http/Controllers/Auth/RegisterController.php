<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function apply(){
        return view('auth.apply');
    }
    public function submitapplication(Request $request)
    {
        $user = new User();
        $id = Str::uuid()->toString();
        $user->USER_id = $id;
        $user->USER_name = $request->input('name');
        $user->USER_email = $request->input('email');
        $user->USER_phone = '';
        $user->USER_role = 'b';
        $user->USER_password = Hash::make('00000000');
        $user->USER_isFirstLog = true;
        $user->save();

        $b = new Brand();
        $b->USER_id = $id;
        $b->BRAND_description = '';
        $b->BRAND_logo_pic_link = '';
        $b->BRAND_application_status ='p';
        $b->save();

        return redirect('/')->with('success', 'Application Forwarded');
       
    }
    
    
    
    
    
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
