@extends('layouts.master')

@section('login')
    <li>
@endsection
@section('inicio')
    <li class="active">
@endsection
@section('equipas')
    <li >
        @endsection

        @section('content')



            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div> <!-- .site-mobile-menu -->


            <div class="site-section py-5">
                <div class="container">
                    <div class="site-section">
                        <div class="container" data-aos="fade-up">
                            <div class="row row-header">
                                <div class="col-sm">
                                    <img src="{{asset('images/csgo.jpg')}}" class="img-thumbnail" alt="Cinque Terre" style="">
                                </div>
                                <div class="col-sm">
                                    <div class="site-section-heading text-center mb-2 w-border col-md-6 mx-auto">
                                        <h2 class="mb-1">{{$torneio->nome}}</h2><br>
                                    </div>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Data início </strong>{{$torneio->data_inicio}}</p>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Prémio </strong>{{$torneio->premio}}</p>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Máximo Equipas </strong>{{$torneio->max_equipas}}</p>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Equipas Inscritas </strong>{{\Illuminate\Support\Facades\DB::table('torneios_equipas')->where('torneio_id','=',$torneio->id)->count()}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm">
                                <div class="site-section-heading">
                                    <h2 class="mb-1">Equipas</h2><br>
                                </div>
                                <div class="row">
                                    @foreach(\Illuminate\Support\Facades\DB::table('torneios_equipas')->where('torneio_id','=',$torneio->id)->get() as $linha)
                                        {{$equipa = \App\Equipa::find($linha[''])}}
                                        <a href="#"><img src="{{asset('images/icon.png')}}" width="100" height="40" class="img-thumbnail" style="max-width: 100%; height: auto">
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="bg-primary" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <p1>Universidade Fernando Pessoa eSports</p1>

                    </div>
                </div>
            </div>



@endsection
