@extends('layouts.admin')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 ">
        <h2>Utilizadores: {{ $total}}</h2>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Nick</th>
                    <th>Email</th>
                    <th>Equipa</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                @php
                $equipa= $user->getNomeEquipa();
                @endphp
                <tr>
                    <td class="align-middle">{{ $user->id }}</td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->nick }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle" style="color: green;font-weight: bold;">{{ $equipa}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>

        {{ $users->links() }}
    </div>
</main>
</div>
@endsection