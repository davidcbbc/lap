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

                            <tbody>


                            @if(session()->has('erro'))
                                <div class="alert alert-danger">
                                    {{ session()->get('erro') }}
                                </div>
                            @endif

                            @if(session()->has('sucesso'))
                                <div class="alert alert-success">
                                    {{ session()->get('sucesso') }}
                                </div>
                            @endif

                                @if(!count($notifications))
                                    <p1>Não há nenhuma notificação para mostrar.</p1>
                                    @endif
                                @foreach($notifications as $notification)
                                    <tr>
                                    <th>{{\App\Equipa::find($notification->data['equipa_id'])->getCapitao()->nick . ' pediu para te juntares à sua equipa'}}</th>
                                    <td>{{\App\Equipa::find($notification->data['equipa_id'])->nome}}</td>
                                    <td><div class="ui-group-buttons">
                                            <form action="/equipa/aceitar" method="POST">
                                                @csrf
                                                <button name="opcao" type="submit" class="btn btn-success" role="button" value="aceitar"><span class="glyphicon glyphicon-floppy-disk"></span>Aceitar</button>
                                                <button name="opcao" type="submit" class="btn btn-danger" role="button" value ="recusar"><span class="glyphicon glyphicon-floppy-disk"></span>Recusar</button>
                                            </form>


                                        </div></td>
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
