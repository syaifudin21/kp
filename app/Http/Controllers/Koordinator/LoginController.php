<?php

namespace App\Http\Controllers\Koordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);
    }

    public function showLoginForm()
    {
        return view('admin.admin-login');
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

        if (Auth::guard('admin')->attempt($credential, false)){
            return redirect()->intended(route('admin.home'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
