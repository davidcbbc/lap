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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{url('images/avatar.jpg')}});"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">{{$info['user']->nick}}</h1>
                            <p>{{$info['user']->name}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                    <div class="site-section">
                        <div class="container" data-aos="fade-up">
                            <div class="row">
                                <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                    <h2 class="mb-5">faculdade</h2><br>
                                </div>

                            </div>
                            <div class ="row">
                                <h2 class="text-center mb-5">{{$info['user']->faculdade}}</h2>
                            </div>
                            </div>



                        <div class="row">
                            <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                <h2 class="mb-5">equipa</h2><br>
                            </div>

                        </div>
                        <div class ="row">
                            <h2 class="text-center mb-5">{{$info['user']->equipa->nome}}</h2>
                        </div>

                        <div class="row">
                            <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                <h2 class="mb-5">mvps</h2><br>
                            </div>

                        </div>
                        <div class ="row">
                            <h2 class="text-center mb-5">{{$info['user']->mvps}}</h2>
                        </div>

                        <div class="row">
                            <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                                <h2 class="mb-5">headshots</h2><br>
                            </div>

                        </div>
                        <div class ="row">
                            <h2 class="text-center mb-5">{{$info['user']->headshots}}</h2>
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
