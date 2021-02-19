<?php

namespace App\Http\Controllers;

use App\Notifications\ConviteEquipa;
use App\Notifications\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CapitaoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified','capitao']);
    }


    public function show(){
        return view('convidar');
    }

    public function convidar(Request $request){
        $request->validate([
            'nick' => ['required','exists:users,nick'],
        ],[
            'nick.exists' => 'Não existe nenhum jogador com este nick',
            'nick.required' => 'Escreva um nick'
        ]);
        $jogador = User::where('nick',$request->nick)->first();
        // Verifica se o jogador ja tem equipa
        if($jogador->equipa_id != null) return redirect()->back()->with('err', 'O jogador ' .$request->nick. ' já tem equipa.' );
        $idEquipa = Auth::user()->equipa->id;
        //ver se o jogador ja foi convidado e se viu o convite
        foreach ($jogador->unreadNotifications as $notification){
            if($notification->type == "App\Notifications\ConviteEquipa"){
                // se for do tipo convite de equipa
                $notif = $notification->data;
                if($notif['equipa_id'] == $idEquipa && $notification->read_at == null)
                    return redirect()->back()->with('err', 'O jogador ' .$request->nick. ' já recebeu um convite, por favor espere que visualize.' );
            }
        }
        // Envia uma notificaco ao jogador escolhido
        $jogador->notify(new ConviteEquipa($idEquipa));
        $jogador->notify(new Message('Geral','Foste convidado agorinha mesmo para uma equipa oh maluco do crl'));
        return redirect()->back()->with('message', 'Convite para ' .$request->nick. ' enviado com sucesso!' );

    }



}
