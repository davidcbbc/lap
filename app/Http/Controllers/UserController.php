<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function edit(){
        return view('settings');
    }

    //edita um user
    public function editar(Request $request){
        $validation = $request->validate([
            'nick' => ['unique:users,nick','max:10'],
            'imagem' => 'file|image|mimes:jpeg,png|max:2048'
        ],[

            'nick.unique' => 'Nick já existe',
            'nick.required' => 'Escreva um nick',
            'nick.max' => 'Nick tem que ter no máximo 10 caracteres',
            'imagem.file' => 'Ficheiro não suportado',
            'imagem.image' => 'Imagem não suportada',
            'imagem.mimes' => 'Extensão de imagem não suportada',
            'imagem.max' => 'Imagem tem que ter no máx 2MB',
            'imagem.uploaded' => 'Erro de imagem : uploaded'
        ]);
        $user = Auth::user();
        if($request->input('nick') != null)
            $user->nick = $request->nick;

        if($request->input('imagem_path') != null) {
            $file = $validation['imagem']; // get the validated file
            $extension = $file->getClientOriginalExtension();
            $jogador = str_replace(" ","_",$request->input('nick'));
            $filename  = "jogador_". $jogador . '.' . $extension;
            $path      = $file->storeAs('public/images', $filename);
            $path = substr($path,7);    //apaga o public
            $user->imagem_path = $path;

        }

        $user->save();
        return redirect('/definicoes');
    }


}
