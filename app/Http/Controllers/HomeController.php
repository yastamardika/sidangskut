<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Status;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $status = Status::all();

        return view('pages.dashboard', compact(['mahasiswa','status']));
    }
    
    public function profil()
    {
        return view('pages.profil');
    }
}
