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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{asset("images/equipa.jpg")}}')"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">Jogadores</h1>
                            <p>da arena.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                    <form action="/users/search" method="GET" role="search">
                        <div class="input-group">
                                <input type="text" class="form-control" name="text"
                                    placeholder="Procurar por nome ou nick">
                                <button type="submit" class="btn btn-primary mx-3">
                                    <span class="">Procurar</span>
                                </button>
                                    
                        </div>
                    </form>
                </div>
            
        
            
                <div class="container mt-5">
                    <div class="row">

                        <table class ="table">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Nick</th>
                                <th scope="col">Equipa</th>
                                <th scope="col">Número Aluno</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th><a href={{url('users/'.$user->id)}}>{{$user->name}}</a></th>
                                    <td>{{$user->nick}}</td>
                                    @if($user->equipa != null)
                                    <td><a href={{url('equipas/'.$user->equipa->id)}}>{{$user->equipa->nome}}</a></td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    <td>{{$user->numero_aluno}}</td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        @if($users->isEmpty())
                            <p>Sem resultados</p>
                            @endif
                        {{$users->links()}}

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
