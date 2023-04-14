<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getRegisterPage(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $validated = $request->validated();
        $user = User::create([
           'name' => $validated['name'],
           'password' => Hash::make($validated['password']),
            'email' => $validated['email']
        ]);

        Auth::login($user);
        return redirect()->route('main');
    }

    public function getLoginPage(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $validated = $request->validated();
        $isRemember = isset($validated['remember']) && $validated['remember'] == 'on';
        if(Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ], $isRemember)){
            $request->session()->regenerate();
            return redirect()->route('main');
        }
        return back()->withErrors([
            'error' => 'Error'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main');
    }
}
