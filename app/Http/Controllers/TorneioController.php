<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TorneioController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function show(){
        return view('torneios');
    }


}
