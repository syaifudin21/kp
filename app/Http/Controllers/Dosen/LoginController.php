<?php

namespace App\Http\Controllers\Dosen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:dosen')->except(['logout']);
    }

    public function showLoginForm()
    {
        return view('dosen.dosen-login');
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

        if (Auth::guard('dosen')->attempt($credential, false)){
            return redirect()->intended(route('dosen.home'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('dosen')->logout();
        return redirect('/');
    }
}
