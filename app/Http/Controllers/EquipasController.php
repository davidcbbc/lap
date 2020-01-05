<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipasController extends Controller
{
    public function index(){
        $equipas = \App\Equipa::all();
        return view('equipas',compact('equipas'));
    }

    public function show($id){
        $equipa = \App\Equipa::findOrFail($id);
        $users = $equipa->users;
        $info = array("equipa" => $equipa , "users"=> $users);
        return view('equipa',compact('info'));
    }



}
