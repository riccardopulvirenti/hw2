<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InformazioneUtente;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            session(['email_utente' => $user->email]);

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Email o password errati.']);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
        User::create([
            'email' => $request->email,
            'password' => $request->password
        ]);
        InformazioneUtente::InizializzaUtente($request->email);
        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('email_utente');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

