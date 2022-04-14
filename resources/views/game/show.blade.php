@extends('layout.main')

@section('content')
<div class="card mt-3">
    @if(!empty($game))
        <h5 class="card-header">     
            {{ $game->name }}
            @if ($userHasGame)
                <form class="float-right m-0" method="post" action="{{ route('me.games.remove') }}">
                   <!-- zasymulowanie wysyłanie formularza metodą delete -->
                   <!-- jest to ukryte pole w formularzu -->
                   <!-- nadpisuje nam metodę, framewor sprawdzi w routach czu jest jakaś tras 
                wyslna metodą delete (pseudomedotą) i maczuje to z akcji
                taki myk laravelowy -->
                    @method('delete')
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="gameId" value="{{ $game->id }}">
                        <button type="submit" class="btn btn-primary mb-2">Usuń z listy</button>
                    </div>
                </form>
            @else
                <form class="float-right m-0" method="post" action="{{ route('me.games.add') }}">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="gameId" value="{{ $game->id }}">
                        <button type="submit" class="btn btn-primary mb-2">Dodaj do mojej listy</button>
                    </div>
                </form>
            @endif
            </h5>
        <div class="card-body">
            <ul>
                <li>Id: {{ $game->id }}</li>
                <li>Nazwa: {{ $game->name }}</li>
                <li>Wydawca: {{ $game->publishers->implode('name', ', ') }}</li>
               <li>Gatunek:{{ $game->genres->implode('name', ', ') }}</li>
            </ul>
            <div class="my-4">
                <h4>Krótki opis</h3>
                <div class="mx-2">{!! $game->short_description !!}</div>
            </div>

            <div class="my-4">
                <h4>Opis</h3>
                <div class="mx-2">{!! $game->description !!}</div>
            </div>

            <div class="my-4">
                <h4>About</h3>
                <div class="mx-2">{!! $game->about !!}</div>
            </div>

            @if (url()->previous() !== route('me.games.list'))
            <a href="{{ url()->previous() }}" class="btn btn-light">Powrót</a>
            @else 
            <a href="{{ route('me.games.list') }}" class="btn btn-light">Lista moich gier</a>
            @endif
        </div>
    @else
        <h5 class="card-header">Brak danych do wyświetlenia</h5>
    @endif
</div>
@endsection
