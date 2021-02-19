@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <h2>Notificação para Jogador</h2>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-5">
        <div class="table-responsive" style="width: 50%; margin: 0 auto;">
            <form action="{{ url('admin/enviar/notificacao')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Notificação </span>
                    <textarea type="text" name="notiJogador" class="form-control" placeholder="Escreve aqui a notificação" aria-label="Notificaçãp" aria-describedby="basic-addon1"> </textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Jogador </span>
                    <select name="to" class="form-control">
                        <option value="all">Todos</option>
                        @foreach($users as $user)
                        <option value="{{$user->email}}">{{$user->nick}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" style="color:white">Enviar</button>
            </form>
        </div>
    </div>
</main>
@endsection