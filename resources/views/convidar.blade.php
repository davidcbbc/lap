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

        @section('content')



            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div> <!-- .site-mobile-menu -->

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('{{url('images/team.jpg')}}');"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">Convidar jogador</h1>

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
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if(session()->has('err'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('err') }}
                                    </div>
                                @endif

                            <form action="/convidar" class="contact-form" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row form-group">
                                    <div class="col-md-12 mb-3 mb-md-0">
                                        <label class="font-weight-bold" for="fullname">Nick do jogador</label>
                                        <input type="text" name="nick" id="user" class="form-control"
                                               placeholder="Nick do jogador" value="{{old('nick')}}">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" value="Convidar" class="btn btn-primary py-3 px-4">

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
                        <p1>Universidade Fernando Pessoa eSports</p1>

                    </div>
                </div>
            </div>



@endsection
