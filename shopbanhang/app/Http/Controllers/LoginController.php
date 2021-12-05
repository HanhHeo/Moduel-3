<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function handlle_login(Request $request)
    {
        $loginUsers = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => "Khách hàng",
        ];
        $loginAdmin =
            [
                'email' => $request->email,
                'password' => $request->password,
                'level' => "Giám đốc",
            ];
        if (Auth::attempt($loginUsers)) {
            return redirect()->route('home');
        }
        if (Auth::attempt($loginAdmin)) {
            return redirect()->route('users.index');
        } else {
            Session::flash('error_email', 'email của bạn không tồn tại');
            Session::flash('error_password', 'mật khẩu của bạn không tồn tại');
            return redirect()->back();
        }
    }
    public function show_login()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=> $request->email,
            'password'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back('')->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
         Auth::logout();
        return redirect()->route('auth.login');
    }
}
