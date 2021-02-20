<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{

        //
        public function __construct()
        {
            $this->middleware('guest');
        }

    public function show(){
        return view('forget_password');
    }


    public function resetPassword(Request $request){
        //Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required' ],[
                'email.required' => 'Escreva um email.',
                'email.exists' => 'Email não existe',
                'password.required' => 'Escreva uma password.',
                'password.min' => 'Passoword tem que ter no mínimo 8 caracteres',
                'confirmed' => 'Passwords não coicidem.',
                'email' => 'Email inválido.',

            ])->validate();


        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return redirect()->back()->with('message','Token não é válido, contacta aafp.eventos@ufp.edu.pt');

        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email não encontrado']);
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        return redirect('/home')->with('message','Password mudada com sucesso!');
    }




    private function sendResetEmail($email,$token){
        //Retrieve the user from the database
        $user = User::where('email', $email)->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = config('base_url') . '/password/reset/' . $token . '?email=' . urlencode($user->email);
        $user->notify(new \App\Notifications\RecuperarPass($link));
    }

    public function validatePasswordRequest(Request $request){
        $validation = $request->validate([
            'email' => 'required|email:rfc'
        ],[
            'email.required' => 'Por favor , escreve um e-mail.',
            'email' => 'Email inválido'
        ]);

        //You can add validation login here
        $user = DB::table('users')->where('email', '=', $request->email)
            ->first();
        //Check if the user exists
        if ($user == null) {
            return redirect()->back()->with('message','Caso a conta exista, foi enviado um e-mail de recuperação :)');
        }

        // Check if recover was already sent
        $getEmail = DB::table('password_resets')
            ->where('email', $request->email)->first();

        if($getEmail!=null) redirect()->back()->with('message','Um e-mail de recuperação já foi enviado');

        //Create Password Reset Token   
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        $this->sendResetEmail($request->email, $tokenData->token);
        return redirect()->back()->with('message','Caso a conta exista, foi enviado um e-mail de recuperação');
    }
}
