<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function sub_login(Request $request){
        $info=$request->input();
        $credentials = $request->only('username', 'password');
        (isset($info['remember']))?$remember=true:$remember=false;
        if (Auth::guard('admin')->attempt($credentials,$remember)) {
            return redirect("/");
        }
        return back()->with("error","账号或密码有误");
    }

    public function logout(){
        Auth::guard("admin")->logout();
        session()->flush();
        return redirect("/login");
    }
}
