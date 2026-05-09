<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input agar data yang masuk bersih
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // Simpan user baru ke database[cite: 1]
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password harus di-hash demi keamanan![cite: 1]
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }


    //function login untuk proses autentikasi
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Coba melakukan login
    if (auth()->attempt($credentials)) {
        // Jika berhasil, buat session baru
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');  
    }

    // Jika gagal, balikkan ke halaman login dengan pesan error
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
}
}