<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view(view: 'login');
    }

    public function Authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(default: '/');
        } else {
            return back()->withErrors([
                'email' => 'Credenciais inválidas.',
            ]);
        }

    }
}

