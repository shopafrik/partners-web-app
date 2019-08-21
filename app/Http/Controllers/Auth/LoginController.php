<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function submitLogin(Request $request){
        $email = $request->input('email');
        $pass = $request->input('password');
        $user =  User::where('USER_email', $email)->get();
        if (count($user) > 0){
            //If user is brand
            if ($user[0]['USER_role'] == 'b'){
                if ($user[0]->brand->BRAND_application_status == 'p'){
                    return redirect('/login')->with('error', 'Application Still Pending');
                }
            }

            if (Hash::check($pass, $user[0]['USER_password'])) {
                if ($user[0]['USER_isFirstLog']){
                    return view('/auth/setpassword')->with('theid', $user[0]['USER_id']);
                }else{
                    if ((($user[0]['USER_role']) == 'a') || (($user[0]['USER_role']) == 'b')){
                        $request->session()->put('loggeduser', $user);
                        return view('pages.dashboard');
                    }
                    else{
                        return redirect('/login')->with('error', 'No access');
                    }
                }
            }
        }
        return redirect('/login')->with('error', 'Wrong Login Details');
    }
    public function logUserOut(Request $request){
        $request->session()->forget('loggeduser');
        return view('/index');
    }
    public function storeNewPassword(Request $request, $id){
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required'
        ]);
        $user = User::find($id);
        if (Hash::check($request->input('old'), $user['USER_password'])) {
            $user->USER_password = Hash::make($request->input('password'));
            $user->USER_isFirstLog = false;
            $user->save();
            return redirect('/login')->with('success', 'Password Reset');
        }else{
            return redirect('/login')->with('error', 'Wrong Password!');
        }
        
    }
























    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }


}
