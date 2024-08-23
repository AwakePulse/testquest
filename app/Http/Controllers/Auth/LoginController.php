<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string'
        ]);

        if(!Auth::attempt($data)) {
            return back()->withInput()->withErrors([
                'email' => 'This email is not registered!'
            ]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect()->route('main_page');
    }
}
