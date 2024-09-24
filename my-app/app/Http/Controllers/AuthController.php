<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller

{
    public function login(){
        
    return view('auth.login');

    }
    //
    public function register(){
        return view('auth.register');
        
    }
    public function authenticate(Request $request){
        echo "martina";
            // exit();
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);
 
      
        if (Auth::attempt($credentials))
        {  
            $request->session()->regenerate();
            if (Auth::user()->role==="admin"){
               return redirect()->route("admin.dashboard");
            }
            else{
               return redirect()->route("home");
            }
        
            
        }
        return redirect()->back()->with('error','email or password is incorrect');
    
    }
    public function store(Request $request){

         $request->validate([
            'username' =>'required|min:5|max:50',
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);

        User::create([
            'name' =>$request->username,
            'email' =>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('auth.login');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
        
    }

}
