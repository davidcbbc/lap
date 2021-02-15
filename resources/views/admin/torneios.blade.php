@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <h2>Torneios: {{ $total}}</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Max-Equipas</th>
                    <th>Nr-Equipas</th>
                    <th>Data Inicio</th>
                    <th>Data Fim</th>
                    <th>Premio</th>
                    <th>Jogo</th>
                    <th>Mais</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach ($torneios as $torneio)
                <tr>
                    <td class="align-middle">{{$torneio->id }}</td>
                    <td class="align-middle" style="color:green;font-weight:bold;">{{$torneio->nome }}</td>
                    <td class="align-middle">{{$torneio->max_equipas }}</td>
                    <td class="align-middle">{{$torneio->num_equipas }}</td>
                    <td class="align-middle">{{$torneio->data_inicio }}</td>
                    <td class="align-middle">{{$torneio->data_fim }}</td>
                    <td class="align-middle">{{$torneio->premio }}</td>
                    <td class="align-middle">{{$torneio->jogo }}</td>
                    <td class="align-middle">
                        <a href="{{ url('admin/torneios/ver',$torneio->id) }}" class="btn btn-success" style="color:white">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $torneios->links() }}

    </div>
    <div>
        <a href="{{ url('admin/criar/torneio') }}" class="btn btn-danger" style="color:white">Criar Torneio</a>
    </div>
</main>
@endsection