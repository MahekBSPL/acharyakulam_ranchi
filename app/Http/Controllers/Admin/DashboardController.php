<?php

namespace App\Http\Controllers\Admin;
use App\MOdels\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    // public function index()
    // {
    //     return view('auth/login');
    // }

    public function check(Request $req)
    {
        //validate form input 
        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.exists' => 'This email id is not register for admin',
        ]);

    

       // dd(Auth::guard('web')->attempt($credentials), Auth::user()->role_id == 2);
        //dd(Auth::user()->role_id);

        $credentials = $req->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials) && Auth::user()->usertype == 2) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully!!!');
        }    
     
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }


}
