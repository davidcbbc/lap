<?php

namespace App\Http\Controllers;

use App\User;
use App\Equipa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request){
        // search for users
        $users=\App\User::where('name','like','%'.$request->input('text').'%')
                                        ->orWhere('nick','like','%'.$request->input('text').'%')
                                        ->paginate(10);
        return view('users',compact('users'));
    }



    public function readNotification(Request $request){
        if($request->input('notificationId')==null) return redirect()->back()->with('message','Alguma coisa correu mal, suspeito ...');
        $notification = Auth::user()->notifications()->find($request->input('notificationId'));
        if($notification==null) return redirect()->back()->with('message','Alguma coisa correu mal');
        $notification->markAsRead();
        return redirect()->back()->with('message','Notificação vista !');
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

    // sai ou elemina a equipa
    public function sair() {
        if(Auth::user()->isCapitao()){
            // se for capitao remove a equipa
            Auth::user()->equipa->delete();
        } else {
            // senao mete a equipa a null
            Auth::user()->equipa_id = null;
            Auth::user()->save();
        }
        return redirect()->back()->with('message','Equipa eleminada com sucesso.');
    }

    public function showAll(){
        $users = \App\User::paginate(10);
        return view('users',compact('users'));
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
