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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('images/equipa.jpg');"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">Equipas</h1>
                            <p>da arena.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                    <div class="row">

                        <table class ="table">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Total Jogadores</th>
                                <th scope="col">Capitão</th>
                                <th scope="col">Torneios</th>
                                <th scope="col">Vitórias</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($equipas as $equipa)
                                <tr>
                                    <th><a href="{{"equipas/" . $equipa->id}}">{{$equipa->nome}}</a></th>
                                    <td>{{$equipa->num_jogadores}}</td>
                                    <td><a href="{{"/users/" . $equipa->user_id}}">{{\App\User::find($equipa->user_id)->nick}}</a></td>
                                    <td>{{$equipa->torneios_vencidos}}</td>
                                    <td>{{$equipa->num_vitorias}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>


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