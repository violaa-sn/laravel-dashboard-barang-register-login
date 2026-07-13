<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $validasi = $request->validate([
            'nama_user' => 'required|max:255',

            'email' => 'required|email|unique:users,email',

            'nomor_telepon' => 'required|max:20',

            'password' => 'required|min:8|confirmed', //confirmed untuk memastikan password dan konfirmasi password sama
        ]);


        /*$user =*/
        User::create([

            'nama_user' => $validasi['nama_user'],

            'email' => $validasi['email'],

            'nomor_telepon' => $validasi['nomor_telepon'],

            'tanggal_registrasi' => now()->toDateString(),

            'password' => $validasi['password'],

        ]);
        /* 
        kalau mau stlh regis lngsung diarahkan ke dashboard atau apapun itu
        Auth::login($user); 
        kalau mau setelah register langsung diarahkan ke dashboard atau apapun itu 
        return redirect()->route('dashboard)
            ->with('success', 'Register berhasil!');

        pakai bris kode ini kalau alurnya emng stlah register ke dashboard
            $request->session()->regenerate(); Regenerasi session untuk mencegah session fixation attack. Laravel membuat Session ID baru setelah login supaya lebih aman.
        */


        return redirect()->route('login')
            ->with('success', 'Register berhasil. Silakan login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse /* RedirectResponse adalah tipe data (return type) yang menyatakan bahwa method ini akan mengembalikan respons berupa redirect.*/
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        /* Auth::attempt() akan:

            1. Mencari user berdasarkan email.
            2. Membandingkan password yang diinput
            dengan password hash di database.
            3. Jika cocok, Laravel akan membuat Session
            sehingga user dianggap sudah login.
        */
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))->with('success', 'Login berhasil.');
            /* redirect()->intended() untuk mengarahkan user ke halaman yang sebelumnya ingin diakses sebelum login.,
            akan otomatis diarahkan halaman default */
        }

        return back()->withErrors([
            'email' => 'email atau password salah.',
        ])->onlyInput('email');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }

    public function profile()
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }
}
