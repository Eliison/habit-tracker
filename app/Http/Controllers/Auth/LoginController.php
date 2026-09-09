<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view(view: 'login');
    }

    public function Authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route(name:'site.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(to: route(name:'site.index'));
    }
}


