<?php

namespace App\Http\Controllers\Seller\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:seller')->except('logout');
    }

    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $login = Auth::guard('seller')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'));
        if($login){
            if(auth('seller')->user()->is_active){
                return redirect()->route('seller.home');
            } else {
                Auth::guard('seller')->logout();
                session()->flash('error', 'Your account is not activated, please contact our help desk!');
                return back();
            }
        }

        session()->flash('error', 'Invalid Credentials!');
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('seller')->logout();
        
        return redirect('/');
    }
}
