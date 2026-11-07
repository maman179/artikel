<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.register', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required | max:255',
                'username' => ['required', 'min:5', 'max:50', 'unique:users'],
                'email' => 'required|email:dns|unique:users',
                'password' => ['required', 'string', Password::min(8)->mixedCase()->numbers()->symbols()],
            ],
            [
                'name.required' => 'Nama lengkap wajib diisi.',
                'name.max' => 'Nama maksimal 255 karakter.',
                'username.required' => 'Username wajib diisi.',
                'username.max' => 'Username maksimal 50 karakter.',
                'username.unique' => 'Username sudah digunakan.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.confirmed' => 'Password harus kombinasi huruf, angka, karakter khusus.',
                'password.min' => 'Password minimal 8 karakter.',
            ]
        );
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil, silakan Login !');
    }
}
