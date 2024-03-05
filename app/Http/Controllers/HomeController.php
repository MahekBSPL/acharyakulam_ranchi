<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function index()
     {
         return view('admin/dashboard');
     }


    // public function check(Request $req)
    // {
    //     //validate form input 
    //     $req->validate(
    //         [
    //             'email' => 'required|email|exists:users,email',
    //             'password' => 'required|min:5|max:15',
    //         ],
    //         [
    //             'email.exists' => 'This email id is not register for admin',
    //         ]
    //     );

    //     return view('admin/dashboard');

    //     //$credentials = $req->only('email', 'password');
        //dd($credentials);
        // return redirect('/admin/dashboard');
        //dd($credentials);
        //dd(Auth::guard('web')->attempt($credentials), Auth::user()->usertype == 2);
        // dd(Auth::user()->usertype);

        //if (Auth::guard('web')->attempt($credentials) && Auth::user()->usertype == 2) {
            // return response()->view('/admin/dashboard');
            //dd(Auth::guard('admin')->attempt($credentials), Auth::user()->role_id == 2);
          //  return redirect()->route('admin.dashboard')->with('success', 'Login Successfully!!!');
      //  }
    //}
}
