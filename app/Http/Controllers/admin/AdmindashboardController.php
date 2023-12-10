<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmindashboardController extends Controller
{
    //------------------Login Form-------------------------
    public function admin_login_form(){
        return view('admin.login');
    }

    //------------------Login Form Send for processing-------------------------
    public function admin_login_process(Request $request){

        $admin = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt($admin)){
            $request->session()->regenerate();
            return redirect()->route('admin_dashboard');
        } else {
            return back()->with('error', 'Email or Password Wrong!');
        }
    }


    //------------------Dashboard----------------------------------
    public function admin_dashboard(){
        return view('admin.dashboard');
    }


    //------------------Admin Register Form-------------------------
    public function admin_register_process(){
        return view('admin.register');
    }


    //------------------Admin Register Create-------------------------
    public function admin_register_create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;

        $admin->save();

        return redirect()->route('admin_dashboard');
    }


    //------------------Admin Logout-------------------------
    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('Home');
    }
    
}
