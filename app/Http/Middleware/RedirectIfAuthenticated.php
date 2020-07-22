<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
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
