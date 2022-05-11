@extends('layout.main')

@section('title', 'Użytkownik')

@section('sidebar')
    @parent
    <div>Lista użytkowników: <a href="{{ route('get.users') }}">Link</a></div>
@endsection

@section('content')
    <div class="card">
        <h5 class="card-header">{{ $user['name'] }}</h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $user->id }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Nick: {{ $user->name }}</li>
                <li>Favourite Team: {{ $user->teams->fullName }}</li>
                <li>Favourite Player: {{ $user->players->firstName . ' ' . $user->players->lastName }}</li>
                {{-- <li>Telefon: {{ $user->phone }}</li> --}}
            </ul>

            <a href="{{ route('get.users') }}" class="btn btn-light">Lista użytkowników</a>
        </div>
    </div>
@endsection
