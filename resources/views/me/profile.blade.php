@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">
            @if ($user->avatar)
                <!-- <img src="{{ Storage::url($user->avatar) }}" class="rounded mx-auto d-block user-avatar"> -->
                <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded mx-auto d-block user-avatar">
            @else
                <img src="/images/avatar.png" class="rounded mx-auto d-block">
            @endif
            <ul>
                <li>Name: {{ $user->name }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Favourite Team: {{ $user->teams->fullName }}</li>
                <li>Favourive Player:
                    {{ $user->players->firstName . ' ' . $user->players->lastName }}
                    {{-- {{ $user->personId }} --}}

                </li>
                {{-- <li>Telefon: {{ $user->phone }}</li> --}}
            </ul>

            <a href="{{ route('me.edit') }}" class="btn btn-primary">Edit account</a>
        </div>
    </div>
@endsection
