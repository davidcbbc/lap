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
                @section('users')
    <li>
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
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Data início </strong>{{Carbon\Carbon::parse($torneio->data_inicio)->format('d M Y')}}</p>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Prémio </strong>{{$torneio->premio}}</p>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Máximo Equipas </strong>{{$torneio->max_equipas}}</p>
                                    <p style="color:white;" class="text-center"><strong style="color: #50c878">Equipas Inscritas </strong>{{count($torneio->equipas)}}</p>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm">
                                @if($errors->any())
                                    <p style="color: orangered">{{$errors->first()}}</p>
                                @endif
                                @if(Auth::user()->isCapitao() && !Auth::user()->equipa->torneios->contains($torneio))
                                    @if(Auth::user()->equipa->users->count() > 5) <!-- TODO MUDAR ISTO PARA < 5 -->
                                        <p>A tua equipa tem que ter pelo menos 5 jogadores para entrar no torneio.</p>
                                        @else
                                        <form action="/torneio/registar" class="contact-form" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <input id="torneio_id" type="hidden" name="torneio_id" value="{{$torneio->id}}">
                                                    <input id="equipa_id" type="hidden" name="equipa_id" value="{{Auth::user()->equipa->id}}">
                                                    <input type="submit" value="Participar" class="btn btn-primary py-2 px-2">
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    @elseif(Auth::user()->equipa == null)
                                        <p>Entra numa equipa para poderes participar no torneio.</p>
                                    @elseif(Auth::user()->equipa->torneios->contains($torneio))
                                        <p style="color: #50c878">A tua equipa está registada no torneio!</p>
                                    @elseif(!Auth::user()->isCapitao())
                                        <p>Apenas o capitão da tua equipa pode registar a equipa no torneio.</p>

                                @endif


                                <div class="site-section-heading w-border">
                                    <h2 class="mb-1">Equipas inscritas</h2><br>
                                </div>
                                <div class="row">
                                    @foreach($torneio->equipas as $equipa)
                                        <a href="{{url('/equipas/'.$equipa->id)}}"><img src="{{asset('storage/'.$equipa->imagem_path)}}" title="{{$equipa->nome}}" width="100" height="40" class="img-thumbnail" style="max-width: 100%; height: auto;margin: 0px 5px 5px">
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
                        <p1>Nova et nove</p1>

                    </div>
                </div>
            </div>



@endsection
