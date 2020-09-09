<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');    
        $this->middleware('guest:seller');    
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:sellers',
            'password' => 'required|string|min:6|confirmed',
            'company_name' => 'required|max:255',
            'city_id' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|min:11|max:11',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('seller.auth.register');
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();
        $data['password'] = bCrypt($request->password);

        Seller::create($data);

        return redirect('/');;
    }
}
