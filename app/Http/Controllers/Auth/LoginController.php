<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function login(Request $request)
    {
        $customMessages = [
            'email.required' => 'Form ini tidak boleh kosong!',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Form ini tidak boleh kosong!',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $customMessages);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/')->with('success', 'Selamat datang Kembali', ' ' . Auth::user()->name);
        }

        // Authentication failed...
        return redirect()->back()->withErrors(['email' => 'Email atau kata sandi salah. ']);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
