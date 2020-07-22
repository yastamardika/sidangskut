<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if (Auth::user()->hasRole('admin')) {
            $this->redirectTo = route('users.index');
            return $this->redirectTo;
        } elseif (Auth::user()->hasRole('mahasiswa')) {
            $this->redirectTo = route('pendaftaran');
            return $this->redirectTo;
        } elseif (Auth::user()->hasRole('akademik')) {
            $this->redirectTo = route('akademik.mahasiswa');
            return $this->redirectTo;
        } elseif (Auth::user()->hasRole('kaprodi')) {
            $this->redirectTo = route('kaprodi.index');
            return $this->redirectTo;
        } elseif (Auth::user()->hasRole('penguji')) {
            $this->redirectTo = route('penguji.index');
            return $this->redirectTo;
        }

        $this->redirectTo = route('dashboard');
        return $this->redirectTo;
    }
}
