<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function index()
    {
        return view('admin.auth.login');
    }


    public function authenticate(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

//        dd($request);

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $user = User::where('username', $username)->first();
            Auth::login($user);
            return redirect('admin/home');
        } else {
            return back()->withErrors(['Invalid credentials!']);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin');
    }
}
