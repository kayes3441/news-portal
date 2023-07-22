<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControlelr extends Controller
{
    public function home(){
        return view('theme.home');
    }
}
