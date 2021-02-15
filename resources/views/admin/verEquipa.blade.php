@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <img src="{{asset('storage/'.$equipa->imagem_path)}}" alt="{{$equipa->nome}}" width="150" height="150">
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <h2>{{$equipa->nome}}</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach ($players as $player)
                <tr>
                    <td class="align-middle">{{$player->id }}</td>
                    <td class="align-middle" style="color:green;font-weight:bold;">{{$player->name}}</td>
                    <td class="align-middle">{{$player->email}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</main>
</div>
@endsection