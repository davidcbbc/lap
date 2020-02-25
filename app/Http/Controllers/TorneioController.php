<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use \App\Torneio;
use File;
use Illuminate\Support\Facades\DB;

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


    public function registarEquipa(Request $request){
        $torneio = \App\Torneio::where('id','=',$request->torneio_id)->get()[0];
        if($torneio->equipas->count() < $torneio->max_equipas){
            DB::table('torneios_equipas')->insert([
                'equipa_id' => $request->equipa_id, 'torneio_id' => $request->torneio_id
            ]);
            return back();
        }
        return back()->withErrors(['O torneio já está cheio.']);
    }


}
