<?php

namespace App\Http\Controllers;

use App\Torneio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // vai se buscar os torneios que ainda vao acontecer
        $torneiosProximos = Torneio::where('fase','REGISTER')->get();
        $torneiosAcabados = Torneio::where('fase','FINISHED')->get();
        $torneiosDecorrer = Torneio::where('fase','STARTED')->get();
        $files = File::allFiles('images/home');
        $randomFile = $files[rand(0,count($files) - 1)];
        $nomeDaImagem = pathinfo($randomFile)['basename'];
        $info = array("torneiosDecorrer" => $torneiosDecorrer,"torneiosAcabados" => $torneiosAcabados,"torneiosProximos" => $torneiosProximos, "imagem" => $nomeDaImagem);
        return view('home',compact('info'));
    }
}
