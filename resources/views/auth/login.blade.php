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
                            <h1 class="text-white">Entrar</h1>
                            <p>ou registar.</p>
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


                            <form action="{{route('login')}}" class="contact-form" method="POST">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="fullname">Email</label>
                                        <input type="text" name="email" id="user" class="form-control" placeholder="Utilizador" value="{{old('email')}}">
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
                                        <input type="submit" value="Entrar" class="btn btn-primary py-3 px-4">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <a href="/register">Registar</a>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <a href="/password/forget">Perdi a password</a>
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
