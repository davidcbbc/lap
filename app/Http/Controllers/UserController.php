<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id){
        $user = \App\User::findOrFail($id);
        //dd($user);
        $equipa = $user->equipa;
        $info = array('user' => $user, 'equipa' => $equipa);
        return view('user',compact('info'));

    }


}
