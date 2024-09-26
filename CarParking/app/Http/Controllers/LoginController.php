<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function registrar (Request $request) {
        
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->save();

    return redirect()->route('login'); 
    }

    public function login (Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Login realizado com sucesso!');
        }
    
        // Autenticação falhou
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ])->withInput($request->except('password')); 
    }
    
}
