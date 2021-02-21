<?php

namespace App\Http\Controllers;

use App\lain;
use DummyFullModelClass;
use Illuminate\Http\Request;
use App\User;
use App\Equipa;
use App\Notifications\Message;
use App\Torneio;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    //retorna todos os users existentes na BD de 10 em 10
    public function index()
    {
        $users = User::paginate(10);
        $total = User::count();
        return view('admin.index', ['users' => $users], ['total' => $total]);
    }
    //retorna todas as equipas existentes na BD de 10 em 10
    public function equipas()
    {
        $equipas = Equipa::paginate(10);
        $total = Equipa::count();
        return view('admin.equipas', ['equipas' => $equipas], ['total' => $total]);
    }
    //retorna todos os torneios existentes na BD de 10 em 10
    public function torneios()
    {
        $torneios = Torneio::paginate(10);
        $total = Torneio::count();
        return view('admin.torneios', ['torneios' => $torneios], ['total' => $total]);
    }
    //retorna a lista de jogadores pertencentes aquela equipa
    public function verEquipa(Equipa $equipa)
    {
        $players = User::all()
            ->where('equipa_id', $equipa->id);
        return view('admin.verEquipa', ['equipa' => $equipa], ['players' => $players]);
    }
    //ver se funciona
    public function verTorneio(Torneio $torneio)
    {
        $equipas = DB::table('equipas')
            ->join('torneios_equipas', 'equipas.id', '=', 'torneios_equipas.equipa_id')
            ->select('equipas.*')
            ->get();

        return view('admin.verTorneio', ['equipas' => $equipas], ['torneio' => $torneio]);
    }

    public function criarTorneioView()
    {
        return view('admin.criarTorneio');
    }

    public function criarNotificacaoJogador()
    {
        return view('admin.notiJogador')->with('users', User::all());
    }

    public function criarNotificacaoEquipa()
    {
        return view('admin.notiEquipa')->with('equipas', Equipa::all());
    }

    public function criarNotificacaoTodos()
    {
        return view('admin.notiTodos');
    }

    public function notificacoes()
    {
        return view('admin.notificacoes');
    }


    public function enviarNotificacao(Request $request)
    {
        if (!empty($request->notiJogador)) {
            $this->enviarNotiJogador($request);
            return redirect()->back()->with('message', 'Notificação enviada!');
        }
        if (!empty($request->notiEquipa)) {
            $this->enviarNotiEquipa($request);
            return redirect()->back()->with('message', 'Notificação enviada!');
        }
        if (!empty($request->notiTodos)) {
            $this->enviarNotiTodos($request);
            return redirect()->back()->with('message', 'Notificação enviada!');
        }
        return redirect()->back();
    }

    /*
            caso seja uma notificacao para um jogador o input tem o nome 'notiJogador' e oo select tem o nome 'to' -->envias date_interval_create_from_date_string
            caso seja uma notificacao para uma equipa o input tem o nome 'notiEquipa' e o select tem o nome 'equipa' é o id dela --> precorrer o pessoal da equipa e enviarNotificacao
            caso seja para todos a notificacao o input tem o nome 'notiTodos' e enviamos para criarNotificacaoTodos
            fiz isto para não termos muitas routes escusadamente
        */


    public function enviarNotiJogador(Request $request)
    {
        $request->validate([
            'notiJogador' => 'required',
            'to' => 'required'
        ]);

        $user = User::find($request->to);
        $user->notify(new Message('Mensagem Privada', $request->notiJogador));
    }

    public function enviarNotiEquipa(Request $request)
    {
        $request->validate([
            'notiEquipa' => 'required',
            'equipa' => 'required'
        ]);

        $users = User::all()
            ->where('equipa_id', $request->equipa);
        foreach ($users as $user) {
            $user->notify(new Message('Mensagem Equipa', $request->notiEquipa));
        }
    }

    public function enviarNotiTodos(Request $request)
    {
        $request->validate([
            'notiTodos' => 'required'
        ]);

        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new Message('Mensagem Geral', $request->notiTodos));
        }
    }

    public function criarTorneio(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'fim' => 'required',
            'link' => 'required',
            'inicio' => 'required',
            'premio' => 'required',
            'maxEquipas' => 'required',
            'jogo' => 'required'
        ]);

        $torneio = new Torneio();
        $torneio->nome = $request->nome;
        $torneio->link = $request->link;
        $torneio->jogo = $request->jogo;
        $torneio->premio = $request->premio;
        $torneio->data_inicio = $request->inicio;
        $torneio->data_fim = $request->fim;
        $torneio->max_equipas = $request->maxEquipas;

        if ($torneio->save())
            return redirect('/admin/torneios')->with('message', "Torneio adicionado com sucesso!");
        return redirect('admin/torneios')->with('message', "Erro ao criar Torneio!");
    }









    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\lain  $lain
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lain  $lain
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lain  $lain
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
