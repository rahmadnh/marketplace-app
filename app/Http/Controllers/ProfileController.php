<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil utama.
     */
    public function index()
    {
        $user = Auth::user(); 
        return view('profile.index', compact('user'));
    }

    /**
     * Menampilkan form edit profil.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Memproses pembaruan data profil.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi Input
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // 2. Update Data
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // 3. Redirect kembali dengan pesan sukses
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}