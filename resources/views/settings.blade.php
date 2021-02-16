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





    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ URL::asset('images/sets.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                    <h1 class="text-white">Definições</h1>

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
                    @if(session()->has('err'))
                    <div class="alert alert-danger">
                        {{ session()->get('err') }}
                    </div>
                    @endif



                    @if(Auth::user()->imagem_path == null)
                    <p1>Sem imagem de perfil</p1>
                    @else
                    <div class="site-section-heading text-center mb-5 w-border col-md-5 mx-auto">
                        <img style="border: transparent;background-color: transparent;" src="{{asset('storage/'.Auth::user()->imagem_path)}}" class="img-thumbnail" alt="Imagem">
                    </div>
                    @endif
                    <form action="/definicoes" class="contact-form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Editar Nickname</label>
                                <input type="text" name="nick" id="user" class="form-control" placeholder="Nickname" value="{{Auth::user()->nick}}">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-3 mb-5 mb-md-2">
                                <div class="input-group image-preview">


                                    <span class="input-group-btn">

                                        <!-- image-preview-input -->
                                        <div class="btn btn-default image-preview-input">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <span class="image-preview-input-title">Alterar imagem de perfil</span>
                                            <input type="file" accept="image/png, image/jpeg, image/gif" name="imagem" />

                                        </div>
                                    </span>
                                </div><!-- /input-group image-preview [TO HERE]-->

                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Confirmar" class="btn btn-primary py-3 px-4">

                            </div>
                        </div>


                    </form>
                    @if(Auth::user()->equipa != null)
                    <form action="/definicoes/sair" class="contact-form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="{{Auth::user()->isCapitao()? "Eleminar equipa" : "Abandonar equipa"}}" class="btn btn-danger py-3 px-4">

                            </div>
                        </div>
                    </form>
                    @endif


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