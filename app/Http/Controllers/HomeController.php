<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

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
        return view('home');
    }

    public function pass_change()
    {
        return view('password_change');
    }

    public function pass_update(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:6|max:12|string|confirmed',
            'password_confirmation'=>'required',
        ]);

        $user=Auth::user();

        if (Hash::check($request->current_password, $user->password)) {

            $user->password=Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success','Password Change Successfully');
        }else{
            return redirect()->back()->with('error','Current Password Wrong');
        }
    }
}
