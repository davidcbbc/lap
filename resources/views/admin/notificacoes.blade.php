@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <h2>Notificações</h2>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-5">
        <div class="table-responsive" style="width: 50%; margin: 0 auto;">
            <a href="{{ url('admin/enviar/notificacao/equipa') }}" class="btn btn-dark" style="color:white">Enviar para uma Equipa</a>
            <a href="{{ url('admin/enviar/notificacao/jogador') }}" class="btn btn-dark" style="color:white">Enviar para um Jogador</a>
            <a href="{{ url('admin/enviar/notificacao/todos') }}" class="btn btn-dark" style="color:white">Enviar para todos</a>
        </div>
    </div>
</main>
@endsection