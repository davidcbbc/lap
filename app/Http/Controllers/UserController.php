<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'nick' => ['max:10'],
            'imagem' => 'file|image|mimes:jpeg,png|max:2048'
        ],[

            'nick.max' => 'Nick tem que ter no máximo 10 caracteres',
            'imagem.file' => 'Ficheiro não suportado',
            'imagem.image' => 'Imagem não suportada',
            'imagem.mimes' => 'Extensão de imagem não suportada',
            'imagem.max' => 'Imagem tem que ter no máx 2MB',
            'imagem.uploaded' => 'Erro de imagem : uploaded'
        ]);
        $user = Auth::user();
        // caso o nick editar seja diferente do antigo
        // nao foi usar a validaton unique pq tambem compara com o proprio nick
        if($request->input('nick') != $user->nick){
            //dd("boas");
            if(User::where('nick','=',$request->nick)->exists()){
                //caso o nick exista
                return redirect()->back()->with('err', 'Nick ja existe.' );
            }
            $user->nick = $request->nick;
        }


        if($request->imagem != null) {
            if($user->imagem_path != null) Storage::delete($user->imagem_path);
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
