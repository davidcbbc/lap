@extends('layouts.master')

@section('login')
    <li>
@endsection
@section('inicio')
    <li>
@endsection
@section('equipas')
    <li class="active">
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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{url('images/team.jpg')}});"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">{{$info['equipa']->nome}}</h1>
                        </div>
                    </div>
                </div>
            </div>



            <div class="site-section">
                <div class="container">
                    <div class="site-section">
                        <div class="container" data-aos="fade-up">
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-5 mx-auto">
                                    <img style="border: transparent;background-color: transparent;" src="{{asset('storage/'.$info['equipa']->imagem_path)}}" class="img-thumbnail" alt="Imagem">
                                </div>
                            </div>
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                    <h2 class="mb-5">membros</h2>
                                </div>
                            </div>

                            <div class="row">

                                @foreach($info['users'] as $user)
                                    <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                                        <div class="team-member">

                                            <img src="{{asset('images/person_1.jpg')}}" alt="Image" class="img-fluid">

                                            <div class="text">

                                                <h2 class="mb-2 font-weight-light h4">{{$user->nick}}</h2>
                                                <p>
                                                    <a href="/users/{{$user->id}}" class="text-white p-2">Perfil</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @guest
                                    @else
                                @if(Auth::user()->id == $info['equipa']->user_id)
                                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
                                            <div class="team-member">

                                                <img src="{{asset('images/add.png')}}" alt="Image" class="img-fluid">

                                                <div class="text">

                                                    <h2 class="mb-2 font-weight-light h4">{{'Novo membro'}}</h2>
                                                    <p>
                                                        <a href="/convidar" class="text-white p-2">Convidar</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                @endguest

                            </div>
                            <br>
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                    <h2 class="mb-1">fundado em</h2><br>
                                </div>
                            </div>
                            <div class ="row">
                                <h2 class="text-center mx-auto mb-5">{{$info['equipa']->created_at}}</h2>
                            </div>

                            <br>
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                    <h2 class="mb-1">partidas vencidas</h2><br>
                                </div>

                            </div>
                            <div class ="row">
                                <h2 class="text-center mx-auto mb-5">{{$info['equipa']->num_vitorias}}</h2>
                            </div>
                            <br>
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                    <h2 class="mb-1">torneios vencidos</h2><br>
                                </div>

                            </div>
                            <div class ="row">
                                <h2 class="text-center mx-auto mb-5">{{$info['equipa']->torneios_vencidos}}</h2>
                            </div>
                            <br>
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
