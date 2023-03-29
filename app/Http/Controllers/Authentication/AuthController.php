<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::toast('Login Successfully', 'success');
            return redirect(route('admin.index'));
        }
        Alert::toast('Login Failed', 'error');
        return redirect(route('auth.index'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        Alert::toast('Logout Successfully' , 'success');
        return redirect(route('auth.index'));
    }
}
