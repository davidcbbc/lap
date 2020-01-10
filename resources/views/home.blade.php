@extends('layouts.master')

@section('login')
    <li>
@endsection
@section('inicio')
    <li class="active">
@endsection
@section('equipas')
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

            <div class="site-blocks-cover overlay" style="background-image: url('images/torneio.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="mb-4">Torneios</h1>
                            <p><a href="/login" class="btn btn-primary px-4 py-3">Ver</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                            <h2 class="mb-5">Próximos jogos</h2>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                            <a href="#" class="unit-9">
                                <div class="image" style="background-image: url('images/csgo.jpg');"></div>
                                <div class="unit-9-content">
                                    <h2>Equipa1 x Equipa2</h2>
                                    <span>13:00 &mdash; 15:30</span>
                                    <span>25-11-2020</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                            <a href="#" class="unit-9">
                                <div class="image" style="background-image: url('images/csgo.jpg');"></div>
                                <div class="unit-9-content">
                                    <h2>Equipa3 x Equipa4</h2>
                                    <span>15:30 &mdash; 18:30</span>
                                    <span>25-11-2020</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>




            <div class="site-section bg-dark block-13">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                            <h2 class="mb-5">Top Jogadores</h2>
                            <p>Melhores jogadores da liga</p>
                        </div>
                    </div>
                    <div class="nonloop-block-13 owl-carousel">

                        <div class="text-center p-3 p-md-5 bg-white">
                            <div class="mb-4">
                                <img src="images/user.png" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
                            </div>
                            <div class="text-black">
                                <h3 class="font-weight-light h5">User1</h3>
                                <p class="font-italic">5 MVP 20 Headshots</p>
                            </div>
                        </div>

                        <div class="text-center p-3 p-md-5 bg-white">
                            <div class="mb-4">
                                <img src="images/user.png" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
                            </div>
                            <div class="text-black">
                                <h3 class="font-weight-light h5">User2</h3>
                                <p class="font-italic">3 MVP 28 Headshots</p>
                            </div>
                        </div>

                        <div class="text-center p-3 p-md-5 bg-white">
                            <div class="mb-4">
                                <img src="images/user.png" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
                            </div>
                            <div class="text-black">
                                <h3 class="font-weight-light h5">User3</h3>
                                <p class="font-italic">2 MVP 15 Headshots</p>
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
