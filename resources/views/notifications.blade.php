@extends('layouts.master')

@section('login')
    <li class="active">
@endsection
@section('inicio')
    <li >
@endsection
@section('equipas')
    <li >
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

            <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ URL::asset('images/awp.jpg') }});"
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
                            <br>

                                @if(!count($notifications))
                                    <p1>Não há nenhuma notificação para mostrar.</p1>
                                @else
                                    <p1>Novas notificações: <b>{{count($notifications)}}</b></p>
                                @endif
                                @foreach($notifications as $notification)
                                    @if($notification->type == "App\Notifications\ConviteEquipa")
                                        <tr>
                                        <td>{{\App\Equipa::find($notification->data['equipa_id'])->getCapitao()->nick . ' pediu para te juntares à sua equipa'}}</td>
                                        <th>{{\App\Equipa::find($notification->data['equipa_id'])->nome}}</th>
                                        <th>{{$notification->created_at}}</th>
                                        <td><div class="ui-group-buttons">
                                                <form action="/equipa/aceitar" method="POST">
                                                    @csrf
                                                    <button name="opcao" type="submit" class="btn btn-success" role="button" value="aceitar">Aceitar</button>
                                                    <button name="opcao" type="submit" class="btn btn-danger" role="button" value ="recusar">Recusar</button>
                                                </form>


                                            </div>
                                        </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{$notification->data['content']}}</td>
                                            <th>{{$notification->data['tipo']}}</th>
                                            <th>{{$notification->created_at}}</th>
                                        <td>
                                            <div class="ui-group-buttons">
                                                    <form action="/notificacoes/visto" method="POST">
                                                        @csrf
                                                        <button name="opcao" type="submit" class="btn btn-info" role="button">OK</button>
                                                        <input type="hidden" id="notificationId" name="notificationId" value="{{$notification->id}}">
                                                    </form>
                                            </div>
                                        </td>
                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>

                        </table>


                    </div>
                </div>
            </div>



            <div class="bg-primary" data-aos="fade">
                <div class="container">
                    <div class="row">
                        <p1>Nova et nove </p1>

                    </div>
                </div>
            </div>



@endsection
