<?php

namespace App\Http\Controllers\Pembimbing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pembimbing')->except(['logout']);
    }

    public function showLoginForm()
    {
        return view('pembimbing.pembimbing-login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('pembimbing')->attempt($credential, false)){
            return redirect()->intended(route('pembimbing.home'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('pembimbing')->logout();
        return redirect('/');
    }
}
