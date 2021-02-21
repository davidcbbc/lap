<link rel="stylesheet" href="{{ URL::asset('/css/tournament.css') }}" />

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

  <div style="min-height: 100%;">

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ URL::asset('images/arena.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
            <h1 class="text-white">{{$torneio->nome}}</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container ">
        <div class="row align-items-center justify-content-center">
          <h2 class="text-white">CLASSIFICAÇÃO</h2>
        </div>
      </div>

      @if($torneio->link!= null)
      <div class="container justify-content-center" style="margin-top: 10%;">
        <iframe src="{{$torneio->link}}" width="100%" height="800" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>
      </div>
      @else
      <div class="container justify-content-center" style="margin-top: 10%;">
      <p>As colocações estão a ser geradas para este torneio , tenta ver mais tarde.</p>
      </div>
      
      @endif
    </div>


                <div class="bg-primary" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <p1>Nova et nove</p1>

                    </div>
                </div>
            </div>
    @endsection