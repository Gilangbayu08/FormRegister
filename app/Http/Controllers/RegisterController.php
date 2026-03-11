<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'gaji_pokok' => 'required|numeric',
            'pinjaman' => 'nullable|numeric',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'gaji_pokok' => $request->gaji_pokok,
            'pinjaman' => $request->pinjaman ?? 0,
        ]);

        return redirect()->route('register')->with('success', 'Registrasi berhasil!');
    }
}
