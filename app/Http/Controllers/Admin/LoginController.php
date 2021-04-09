<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\LoginRequest;

class LoginController extends Controller
{
    public function getlogin()
    {
        return view('admin.Auth.login');
    }
    public function login(LoginRequest $request)
    {
          if(auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
              notify()->success('تم الدخول بنجاح');
              return redirect()->route('admin.dashboard');
          }
          notify()->error('حدث خطأ في البيانات برجاء المحاولة مجددا');
          return \redirect()->back()->withErrors($validator)->withInput($request->all());
    }
}
