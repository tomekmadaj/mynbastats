@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>Lista użytkowników
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Lp</th>
                            <th>Id</th>
                            <th>Nick</th>
                            <th>Email</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    @can('view', $user)
                                        {{-- jeżeli nie mamy modelu a chcemy coś uwarunkować
                                        np. tworzenie nowego użytkownika to trzeba podać pełną ścieżkę do modelu
                                        @can('view', App\Model\User::class) --}}
                                        <a href="{{ route('get.user.show', ['userId' => $user['id']]) }}">Szczegóły</a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
