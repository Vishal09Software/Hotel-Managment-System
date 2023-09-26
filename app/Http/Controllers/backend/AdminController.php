<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Cookie;


class AdminController extends Controller
{
    public function login(){
        return view('backend.login');
    }

    public function check_login(Request $request ){
        $request->validate([
            'username'=>'required',
            'password'=>'required',
    ]);
    $admin = Admin::where([
        'username'=>$request->input('username'),
        'password'=>$request->input('password'),
    ])->count();

    if($admin>0){
        $adminData = Admin::where([
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
        ])->get();
        session(['admindata'=>$adminData]);

        if($request->has('rememberme')){
            Cookie::queue('adminuser',$request->username ,1440);
            Cookie::queue('adminpwd',$request->password ,1440);
        }
        return redirect('dashboard');
    }
    else{
        return redirect('login')->with('success' , 'invaild username and password !!');
    }
    }
    public function logout(){
        session()->forget(['admindata']);
        return redirect('login');
    }
}
