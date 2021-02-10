<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Checkar se o user e aluno da UFP

        $client = new Client(['http_errors' => false]);
        // usa api da faculdade para ver se o user e valido
        try {
            $res = $client->request('POST', 'https://siws.ufp.pt/api/v1/login', [
                'form_params' => [
                    'username' => $request->input('numero_aluno'),
                    'password' => $request->input('pass_aluno'),
                ]
            ]);
        } catch(\Throwable $e){
            // se nao conseguir fazer a request
            $errors=array("Sem resposta do servidor da ufp. Tenta mais tarde ou envia e-mail para aafp.eventos@ufp.edu.pt");
            return redirect()->back()->withErrors($errors);
        }

        // depois de ver a api , vamos checkar o status code , qql coisa fora de 200 nao esta correto
        if($res->getStatusCode()!=200){
            // caso nao estam corretas
            $errors=array("User do portal não está correto, por favor usa umas credenciais válidas do portal - https://portal.ufp.pt");
            return redirect()->back()->withErrors($errors);
        }
        

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $customMessages = [
            'name.required' => 'Escreva um nome de utilizador.',
            'name.max'=> 'Nome não pode ter mais que 30 caracteres',
            'email.required' => 'Escreva um email.',
            'password.required' => 'Escreva uma password.',
            'name.min' => 'Utilizador tem que ter no mínimo 4 caracteres.',
            'confirmed' => 'Passwords não coicidem.',
            'nick.unique' => 'Nick já existe.',
            'nick.required' => 'Escreva um nick.',
            'nick.max' => 'Nick não pode ter mais que 10 caracteres',
            'email.unique' => 'Email já existe.',
            'password.min' => 'Passoword tem que ter no mínimo 8 caracteres',
            'email' => 'Email inválido.',
            'nick.min' => 'Nick tem que ter no mínimo 3 caracteres.',
            'numero_aluno.required' => 'Escreva um user do portal UFP.',
            'numero_aluno.max' => 'Número de aluno do portal UFP tem 5 dígitos.',
            'numero_aluno.min' => 'Número de aluno do portal UFP tem 5 dígitos.',
            'pass_aluno.required' => 'Escreva uma password do portal UFP.',
        ];

        return Validator::make($data, [
            'name' => 'required|min:4|max:30',
            'numero_aluno' => 'required|min:5|max:5',
            'pass_aluno' => 'required',
            'email' => 'required|unique:users|email:rfc',
            'password' => 'required|confirmed|min:8',
            'nick' => 'required|min:3|unique:users|max:10'
        ],$customMessages);
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nick' => $data['nick'],
            'numero_aluno' => $data['numero_aluno']
        ]);
    }
}
