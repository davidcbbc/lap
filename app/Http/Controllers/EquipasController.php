<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Equipa;
use Illuminate\Support\Facades\Auth;

class EquipasController extends Controller
{

    public function search(Request $request){
        // search for team
        $equipas=\App\Equipa::where('nome','like','%'.$request->input('text').'%')->paginate(10);
        return view('equipas',compact('equipas'));
    }

    public function index(){
        $equipas = \App\Equipa::orderBy('torneios_vencidos')->paginate(10);
        return view('equipas',compact('equipas'));
    }

    public function show($id){
        $equipa = \App\Equipa::findOrFail($id);
        $users = $equipa->users;
        $info = array("equipa" => $equipa , "users"=> $users);
        return view('equipa',compact('info'));
    }

    public function create(){
        return view('addteam');
    }

    //funcao para aceitar convites de equipas
    public function aceitar(Request $request){
        $user = Auth::user();
        // get the team notification
        foreach ($user->unreadNotifications as $notif) {
            dd($notif);
        }
        $notification = $user->unreadNotifications()->first();
     if($request->opcao == "aceitar") {
         $equipaId = $notification->data['equipa_id'];
         try{
             $equipa = \App\Equipa::findOrFail($equipaId);
             $equipa->num_jogadores++;
             $user->equipa_id = $equipaId;
             $user->save();
             $equipa->save();
             $notification->markAsRead();
             return redirect()->back()->with('sucesso', 'Convite para equipa aceite.' );
         }catch (\Exception $e) {
             // equipa eleminada
             return redirect()->back()->with('erro', 'Convite já não é válido.' );
         }
     }
        $notification->markAsRead();
        return redirect()->back();
    }


    //adiciona nova equipa
    public function add(Request $request){
        //validações de imagem e nome
        $validation = $request->validate([
            'imagem' => 'required|file|image|mimes:jpeg,png|max:2048',
            'name' => 'required|max:15|unique:equipas,nome'
        ],[
            'imagem.required' => 'É necessário uma imagem',
            'imagem.file' => 'Ficheiro não suportado',
            'imagem.image' => 'Insira uma imagem',
            'imagem.mimes' => 'Extensão não suportada',
            'imagem.max' => 'Ficheiro demasiado grande , máx 2MB',
            'imagem.uploaded' => 'Ficheiro demasiado grande , máx 2MB',
            'name.required' => 'É necessário um nome',
            'name.max' => 'Nome tem no máximo 15 caracteres',
            'name.unique' => 'Nome de equipa já existe'
        ]);
        $file      = $validation['imagem']; // get the validated file
        $extension = $file->getClientOriginalExtension();
        $equipa = str_replace(" ","_",$request->input('name'));
        $filename  = $equipa . '.' . $extension;
        $path      = $file->storeAs('public/images', $filename);
        $path = substr($path,7);    //apaga o public
        //adiciona nova equipa a bd
        $novaEquipa = new Equipa;
        $novaEquipa->nome = $request->input('name');
        $novaEquipa->num_jogadores = 1;
        $novaEquipa->imagem_path = $path;
        $novaEquipa->user_id = Auth::user()->id;
        $novaEquipa->num_vitorias = 0;
        $novaEquipa->torneios_vencidos = 0;
        $novaEquipa->save();
        Auth::user()->equipa_id = $novaEquipa->id;
        Auth::user()->save();
        return redirect('equipas/' . $novaEquipa->id);
    }



}
