<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConviteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show(){
        return Auth::id();
    }

}
