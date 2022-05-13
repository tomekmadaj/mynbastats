@extends('layout.main')

@section('content')
    <h5 class="mb-4">
        <b> {{ $team->fullName }} latest News</b>
    </h5>

    @foreach ($teamNews as $news)
        <div class="card mb-5">
            <div class="card-header d-flex flex-row justify-content-between">
                <p class="mb-0"> <b> {{ $news['title'] }} </b> </p>
                <p class="mb-0"> {{ $news['date'] }} </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{ $news['content'] }}</li>
            </ul>
            <div class="card-body" style="font-size: 12px">
                Source: <a href={{ $news['source'] }} target="_blank" class="card-link">Roto Baller</a>
            </div>
        </div>
    @endforeach
@endsection
