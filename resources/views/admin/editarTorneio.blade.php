@extends('layouts.admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <form enctype="multipart/form-data" action="{{ url('admin/torneios/editar',$torneio->id)}}" method="POST">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mt-5">
            <div class="table-responsive" style="width: 50%; margin: 0 auto;">
                <h2 class="mb-2">Editar Torneio:</h2>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Nome </span>
                    <input type="text" value="{{$torneio->nome}}" name="nome" class="form-control" placeholder="Nome do Evento" aria-label="Nome" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Link Tree: </span>
                    <input type="text" value="{{$torneio->link}}" name="link" class="form-control" placeholder="Link Tree" aria-label="Link" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Max-Equipas</span>
                    <select name="maxEquipas">
                        <option value="{{$torneio->max_equipas}}">{{$torneio->max_equipas}}</option> @for($i=0; $i<=24;$i++) <option value="{{$i}}">{{$i}}</option>
                            @endfor
                    </select>
                    <span class="input-group-text ms-2" id="basic-addon1">Prémio:</span>
                    <input type="number_format" value="{{$torneio->premio}}" name="premio" class="form-control" placeholder="Prémio" aria-label="Prémio" aria-describedby="basic-addon1">
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Jogo:</span>
                    <input type="text" value="{{$torneio->jogo}}" name="jogo" class="form-control" placeholder="Descrição do Evento" aria-label="Jogo" aria-describedby="basic-addon1">
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Inicio:</span>
                    <input type="date" value="{{$torneio->data_inicio}}" name="inicio" class="form-control" placeholder="Data do Evento" aria-label="Username" aria-describedby="basic-addon1">
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Fim:</span>
                    <input type="date" value="{{$torneio->data_fim}}" name="fim" class="form-control" placeholder="Data do Evento" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <button type="submit" name="inserir" class="btn btn-success">Editar</button>
            </div>
        </div>
    </form>
</main>
@endsection