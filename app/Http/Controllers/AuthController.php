<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect(route('admin.index'));
        }
        return redirect(route('auth.index'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('auth.index'));
    }
}
