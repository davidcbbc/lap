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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('images/login.jpg');"
                 data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
                            <h1 class="text-white">Notificações</h1>

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
                                <th scope="col">Notificação</th>
                                <th scope="col">Equipa</th>
                                <th scope="col">Ação</th>
                                <th scope="col">Marcar como lida</th>


                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                @foreach($notifications as $notification)

                                    <th>{{\App\Equipa::find($notification->data['equipa_id'])->getCapitao()->nick . ' pediu para te juntares à sua equipa'}}</th>
                                    <td>{{\App\Equipa::find($notification->data['equipa_id'])->nome}}</td>
                                    <td><div class="ui-group-buttons">
                                            <a href="" class="btn btn-success" role="button"><span class="glyphicon glyphicon-floppy-disk"></span></a>
                                            <div class="or"></div>
                                            <a href="" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                        </div></td>
                                    <td><button type="button" class="">
                                            <span class="btn-label "><i class="glyphicon glyphicon-ok"></i></span>Marcar como lida</button>
                                    </td>
                                @endforeach
                            </tr>
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
