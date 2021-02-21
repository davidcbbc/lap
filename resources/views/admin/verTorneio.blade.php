@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <h2>{{$torneio->nome}}</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Jogadores</th>
                    <th>Vitórias</th>
                    <th>Torneios Vencidos</th>
                    <th>Logo</th>
                    <th>Mais</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach ($equipas as $equipa)
                <tr>
                    <td class="align-middle">{{$equipa->id }}</td>
                    <td class="align-middle" style="color:green;font-weight:bold;">{{$equipa->nome }}</td>
                    <td class="align-middle">{{$equipa->num_jogadores }}</td>
                    <td class="align-middle">{{$equipa->num_vitorias }}</td>
                    <td class="align-middle">{{$equipa->torneios_vencidos }}</td>
                    <td class="align-middle" style="color: green;font-weight: bold;">
                        <img src="{{asset('storage/'.$equipa->imagem_path)}}" alt="{{$equipa->nome}}" width="150" height="150">
                    </td>
                    <td class="align-middle">
                        <a href="{{ url('admin/equipas/ver',$equipa->id) }}" class="btn btn-success" style="color:white">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
</div>
@endsection