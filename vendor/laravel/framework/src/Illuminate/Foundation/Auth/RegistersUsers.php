<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
