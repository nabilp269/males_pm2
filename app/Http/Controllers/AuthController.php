<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view ('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $user = User::where('email', $request->email)->first();
 
        // if (! $user || ! Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }

        // return $user->createToken('user-login')->plainTextToken;
        
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index')
                                 ->with('success', 'Berhasil login sebagai admin!');
            } else {
                return redirect()->route('user.index')
                                 ->with('success', 'Berhasil login!');
            }
        }
        
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->withInput($request->only('email', 'remember'));

        

    }

    

    public function register(Request $request)
    {



        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,

        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login!');

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}