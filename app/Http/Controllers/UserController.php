<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('one');
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
            'name' => 'required|min:4|unique:users',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|confirmed'
        ];

        $customMessages = [
            'name.required' => 'Escreva um nome de utilizador.',
            'email.required' => 'Escreva um email.',
            'password.required' => 'Escreva uma password.',
            'name.min' => 'Utilizador tem que ter no mínimo 4 caracteres.',
            'confirmed' => 'Passwords não coicidem.',
            'name.unique' => 'Utilizador já existe.',
            'email.unique' => 'Email já existe.',
            'email' => 'Email inválido.'
        ];

        $this->validate(request(), $rules, $customMessages);




        //$user = new User;
        //$user->name = request()->name;
        //$user->faculdade = request()->faculdade;
        //$user->email = request()->email;
        //$user->password = request()->password;
        //$user->save();
        $user = User::create(request(['name', 'email', 'password','faculdade']));
        return $user;
    }

}
