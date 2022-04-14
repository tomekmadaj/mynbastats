@extends('layout.main')

@section('content')
    <h2 class="pt-1">Hej hej hej tu NBA</h2>
    @auth
        <p>Elo {{ $user->name }}</p>
    @endauth

    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>NBA Teams</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Team Name</th>
                                <th>City</th>
                                <th>Conference</th>
                                <th>Division</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams ?? [] as $team)
                                <tr>
                                    <td>{{ $team->id }}</td>
                                    <td>{{ $team->fullName }}</td>
                                    <td>{{ $team->city }}</td>
                                    <td>{{ $team->confName }}</td>
                                    <td>{{ $team->divName }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Lakers Players</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>teamId</th>
                                {{-- <th>Team</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players ?? [] as $player)
                                <tr>
                                    <td>{{ $player->firstName . ' ' . $player->lastName }} </td>
                                    <td>{{ $player->teams->teamId }}</td>
                                    {{-- <td>{{ $player->teams->teamId }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
