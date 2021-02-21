@extends('layouts.master')

@section('login')
    <li class="active">
@endsection
@section('inicio')
    <li>
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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('images/login.jpg');"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">Registar</h1>
                            <p>na arena.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="site-section">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-lg-7 mb-5">

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <form action="{{route('register')}}" class="contact-form" method="POST">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="fullname">Primeiro e último nome</label>
                                        <input type="text" name="name" id="user" class="form-control" placeholder="Primeiro e último nome" value="{{old('name')}}">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="fullname">Nickname</label>
                                        <input type="text" name="nick" id="nick" class="form-control" placeholder="Nickname" value="{{old('nick')}}">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="fullname">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                    </div>
                                </div>



                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold" for="message">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold" for="message">Repete password</label>
                                        <input type="password" name="password_confirmation" id="password2" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <br>
                                <p>As seguintes informações servem para garantir a exclusividade do torneio aos alunos inscritos na UFP. Não guardamos a password do portal na nossa base de dados.</p>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold" for="message">Número de aluno</label>
                                        <input type="number" name="numero_aluno" id="numero_aluno" class="form-control" placeholder="Número de aluno">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold" for="message">Password do portal UFP - portal.ufp.pt</label>
                                        <input type="password" name="pass_aluno" id="pass_aluno" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                          


                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" value="Registar" class="btn btn-primary py-3 px-4">
                                    </div>
                                </div>



                            </form>

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
