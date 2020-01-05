<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index() {
        return view('one');
    }

    public function show($id){
        $user = \App\User::findOrFail($id);
        //dd($user);
        $equipa = $user->equipa;
        $info = array('user' => $user, 'equipa' => $equipa);
        return view('user',compact('info'));

    }

    public function registo() {
        return view('registo');
    }

    public function loginPage() {
        return view('login');
    }

    public function login(User $user) {
        return $user;
    }

    public function create(User $user) {

        $rules = [
            'name' => 'required|min:4',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|confirmed',
            'nick' => 'required|min:3|unique:users'
        ];

        $customMessages = [
            'name.required' => 'Escreva um nome de utilizador.',
            'email.required' => 'Escreva um email.',
            'password.required' => 'Escreva uma password.',
            'name.min' => 'Utilizador tem que ter no mínimo 4 caracteres.',
            'confirmed' => 'Passwords não coicidem.',
            'nick.unique' => 'Nick já existe.',
            'nick.required' => 'Escreva um nick.',
            'email.unique' => 'Email já existe.',
            'email' => 'Email inválido.',
            'nick.min' => 'Nick tem que ter no mínimo 3 caracteres.'
        ];

        $this->validate(request(), $rules, $customMessages);

        $user = User::create(request(['name', 'email', 'password','faculdade','nick']));
        return $user;
    }




}
