<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;


class AdminLoginController extends Controller
{
    public function showLoginForm(){        
        return view('admin.loginForm');
    }

    public function loginAdmin(Request $request){
        
        $validated = $request->validate([
            'phone'=>'required',
            'password'=>'required'
        ]);

        $data = [
            'phone' => $request->phone,
            'password' => $request->password
        ];
        if(Auth::attempt($data)){
            if(Auth::user()->rols == 2){
                return redirect()->route('showAdminHomePage');
            }
        } else {
            return redirect()->route('showLoginForm')->with('loginError','неверный логин или пароль');
        }        
    }

    public function logOut(){
        auth()->logout();
        return redirect()->route('showLoginForm');
    }
}
