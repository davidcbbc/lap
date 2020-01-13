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


            <div class="site-section py-5">
                <div class="container">
                    <div class="site-section">
                        <div class="container" data-aos="fade-up">
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                    <h2 class="mb-5">{{$info['user']->nick}}</h2>
                                    <p>{{$info['user']->name}}</p>
                                </div>
                            </div>

                            @if($info['user']->imagem_path != null)
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-3 mx-auto">
                                    <img src="{{asset('storage/'.$info['user']->imagem_path)}}" class="img-thumbnail" alt="Imagem">
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="site-section-heading text-center mb-2 w-border col-md-6 mx-auto">
                                    <h2 class="mb-2">Faculdade</h2><br>
                                </div>
                            </div>
                            <div class ="row">
                                <h2 class="text-center mx-auto mb-4">UFP</h2>
                            </div>
                            <br>

                            <br>
                            @if($info['user']->equipa_id !=null)
                            <div class="row">
                                <div class="site-section-heading text-center mb-2 w-border col-md-6 mx-auto">
                                    <h2 class="mb-1">Equipa</h2><br>
                                </div>

                            </div>

                            <div class ="row">
                                <h2 class="text-center mx-auto mb-4">{{$info['user']->equipa->nome}}</h2>
                            </div>
                            <br>
                            @endif
                            <div class="row">
                                <div class="site-section-heading text-center mb-2 w-border col-md-6 mx-auto">
                                    <h2 class="mb-1">% de headshots</h2><br>
                                </div>
                            </div>
                            <div class ="row">
                                <h2 class="text-center mx-auto mb-4">60%</h2>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="site-section-heading text-center mb-2 w-border col-md-6 mx-auto">
                                <h2 class="mb-1">MVPs totais</h2><br>
                            </div>
                        </div>
                        <div class ="row">
                            <h2 class="text-center mx-auto mb-4">24</h2>
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
