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

            <div class="site-blocks-cover inner-page-cover overlay aos-init aos-animate" style="background-image: url({{ URL::asset('images/home/'.$info['imagem']) }});" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="mb-4">Torneios</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                            <h2 class="mb-5">Próximos</h2>
                        </div>
                    </div>
                    <div class="row">
                        @if($info['torneiosProximos']->isEmpty())
                            <p>Sem torneios de momento</p>
                        @endif
                        @foreach($info['torneiosProximos'] as $torneio)
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                <a href="/torneio/{{$torneio->id}}" class="unit-9">
                                    <div class="image" style="background-image: url({{ URL::asset('images/csgo.jpg') }});"></div>
                                    <div class="unit-9-content">
                                        <h2>{{$torneio->nome}}</h2>
                                        <span> <b style="color:#50c878">jogo</b> {{$torneio->jogo}}</span>
                                        <span> <b style="color:#50c878">início</b> {{Carbon\Carbon::parse($torneio->data_inicio)->format('d M Y')}}</span>
                                        <span> <b style="color:#50c878">prémio</b> {{$torneio->premio}}</span>
                                        <span> <b style="color:#50c878">fase</b> {{$torneio->fase}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                            <h2 class="mb-5">A decorrer</h2>
                        </div>
                    </div>
                    <div class="row">
                        @if($info['torneiosDecorrer']->isEmpty())
                            <p>Sem torneios de momento</p>
                        @endif
                        @foreach($info['torneiosDecorrer'] as $torneio)
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                <a href="/torneio/{{$torneio->id}}" class="unit-9">
                                    <div class="image" style="background-image: url({{ URL::asset('images/csgo.jpg') }});"></div>
                                    <div class="unit-9-content">
                                        <h2>{{$torneio->nome}}</h2>
                                        <span> <b style="color:#50c878">jogo</b> {{$torneio->jogo}}</span>
                                        <span> <b style="color:#50c878">início</b> {{Carbon\Carbon::parse($torneio->data_inicio)->format('d M Y')}}</span>
                                        <span> <b style="color:#50c878">prémio</b> {{$torneio->premio}}</span>
                                        <span> <b style="color:#50c878">fase</b> {{$torneio->fase}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                            <h2 class="mb-5">Acabados</h2>
                        </div>
                    </div>
                    <div class="row">
                        @if($info['torneiosAcabados']->isEmpty())
                            <p>Sem torneios de momento</p>
                        @endif
                        @foreach($info['torneiosAcabados'] as $torneio)
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                <a href="/torneio/{{$torneio->id}}" class="unit-9">
                                    <div class="image" style="background-image: url({{ URL::asset('images/csgo.jpg') }});"></div>
                                    <div class="unit-9-content">
                                        <h2>{{$torneio->nome}}</h2>
                                        <span> <b style="color:#50c878">jogo</b> {{$torneio->jogo}}</span>
                                        <span> <b style="color:#50c878">início</b> {{Carbon\Carbon::parse($torneio->data_inicio)->format('d M Y')}}</span>
                                        <span> <b style="color:#50c878">prémio</b> {{$torneio->premio}}</span>
                                        <span> <b style="color:#50c878">fase</b> {{$torneio->fase}}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach

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
