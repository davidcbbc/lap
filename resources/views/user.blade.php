@extends('layouts.master')

@section('login')
<li>
    @endsection
    @section('inicio')
<li>
    @endsection
    @section('equipas')
<li>
    @endsection
    @section('users')
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


    <div class="site-section py-5">
        <div class="container">
            <div class="site-section">
                <div class="container" data-aos="fade-up">




                    <div class="row row-header">
                        <div class="col-sm">
                            @if($info['user']->imagem_path != null)
                            <img style="border: transparent;background-color: transparent;" src="{{asset('storage/'.$info['user']->imagem_path)}}" class="img-thumbnail" alt="Imagem" height="300" width="300">
                            @else
                            <img style="border: transparent;background-color: transparent;" src="{{asset('images/gamer.png')}}" class="img-thumbnail" alt="Imagem" height="300" width="300">
                            @endif
                        </div>
                        <div class="col-sm">
                            <div class="site-section-heading text-center mb-2 w-border mx-auto">
                                <h2 class="">{{$info['user']->name}}</h2>
                            </div>

                            <div class="row" style="margin-top: 100px">
                                <div class="site-section-heading">
                                    <h2 class="">Nickname &nbsp</h2>
                                </div>
                                <h2 style="color:#50c878;">{{$info['user']->nick}}</h2>
                            </div>

                            <div class="row">
                                <div class="site-section-heading">
                                    <h2 class="mb-1">Equipa &nbsp</h2><br>
                                </div>
                                @if($info['user']->equipa != null)
                                <h2 style="color:#50c878;" class="text-center">{{$info['user']->equipa->nome}}</h2>
                                @else
                                <h2 style="color: grey;" class="text-center">Sem equipa</h2>
                                @endif
                            </div>

                            <div class="row">
                                <div class="site-section-heading">
                                    <h2 class="">Número Aluno&nbsp</h2>
                                </div>
                                <h2 style="color:#50c878;">{{$info['user']->numero_aluno}}</h2>
                            </div>



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