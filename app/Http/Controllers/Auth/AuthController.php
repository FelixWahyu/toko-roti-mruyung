<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Memproses data dari form registrasi.
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // role otomatis 'pelanggan' karena itu default di migrasi
        ]);

        // Login user yang baru dibuat
        // Auth::login($user);

        // Redirect ke halaman utama
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login dengan akun Anda.');
    }

    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses data dari form login.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Coba untuk otentikasi user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'superadmin') {
                // return redirect()->route('admin.dashboard'); // Nanti akan kita buat
                return redirect()->route('admin.dashboard.index')->with('success', 'Login Berhasil, selamat datang!');
            } elseif ($user->role === 'owner') {
                // return redirect()->route('owner.dashboard'); // Nanti akan kita buat
                return redirect()->route('admin.dashboard.index')->with('success', 'Login Berhasil, selamat datang!');
            } else {
                return redirect()->intended('/')->with('success', 'Login Berhasil, selamat datang!'); // Redirect ke halaman yang dituju sebelumnya atau ke home
            }
        }

        // Jika otentikasi gagal
        return back()->with('error', 'Username atau password salah.');
    }

    /**
     * Proses logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
