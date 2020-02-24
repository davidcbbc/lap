<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Torneio;
use File;

class TorneioController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }




    public function show($id){
        $torneio = Torneio::findOrFail($id);
        return view('torneios', compact('torneio'));
    }


}
