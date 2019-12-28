@extends('layouts.master')

@section('login')
<li class="active">
@endsection
@section('inicio')
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



          <form action="/registo" class="contact-form" method="POST">
            {{ csrf_field() }}
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Utilizador</label>
                <input type="text" name="name" id="user" class="form-control" placeholder="Utilizador" value="{{old('name')}}">
              </div>
            </div>

            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                </div>
            </div>


            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Faculdade</label>
                <select class="form-control" name="faculdade">
                    <option value="ufp">UFP</option>
                    <option value="feup">FEUP</option>
                    <option value="isep">ISEP</option>
                    <option value="outro">Outra</option>
                  </select>
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

            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Registar" class="btn btn-primary py-3 px-4">
              </div>
            </div>



          </form>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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