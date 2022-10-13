<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index () // respnsible for showing the form
    {
        
        return view('auth.login');
    }

    public function store(Request $request) //responsible for signin user in
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
           ]);

           //this if statement provides an error if credentials arent correct
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back() ->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
