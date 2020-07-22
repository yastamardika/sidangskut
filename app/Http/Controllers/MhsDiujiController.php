<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MhsDiujiController extends Controller
{
    function index(){
        $mhs = User::all()->where('id_status','3');


    }
}
