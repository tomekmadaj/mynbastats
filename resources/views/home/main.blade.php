@extends('layout.main')

@section('content')
    <h2 class="pt-1">Hej hej tu NBA</h2>
    @auth
        <p>Elo {{ $user->name }}</p>
    @endauth

    {{-- standings --}}
    <h5 class="mt-5">
        <b> 2021-2022 NBA Regular Season Standings</b>
    </h5>
    <div class="row">
        <div class="col-6">
            <div class="card mt-3">
                <div class="card">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>NBA West Conference Standings</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Team Name</th>
                                        <th>Win</th>
                                        <th>Loss</th>
                                        <th>Win %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($standingsWest ?? [] as $standing)
                                        <tr>
                                            <td>{{ $standing->confRank }}</td>
                                            <td>
                                                <img style="height: 30px"
                                                    src="/images/NbaLogos/{{ $standing->teams->teamId }}.png"
                                                    class="mx-auto rounded">
                                                {{ $standing->teams->fullName }}
                                            </td>
                                            <td>{{ $standing->win }}</td>
                                            <td>{{ $standing->loss }}</td>
                                            <td>{{ $standing->winPct }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card mt-3">
                <div class="card">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>NBA East Conference Standings</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Team Name</th>
                                        <th>Win</th>
                                        <th>Loss</th>
                                        <th>Win %</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($standingsEast ?? [] as $standing)
                                        <tr>
                                            <td>{{ $standing->confRank }}</td>
                                            <td> <img style="height: 30px"
                                                    src="/images/NbaLogos/{{ $standing->teams->teamId }}.png"
                                                    class="mx-auto rounded">
                                                {{ $standing->teams->fullName }}</td>
                                            <td>{{ $standing->win }}</td>
                                            <td>{{ $standing->loss }}</td>
                                            <td>{{ $standing->winPct }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Nba leaders --}}
    <h5 class="mt-5 mb-4">
        <b> 2021-2022 Regular Season Leaders</b>
    </h5>

    <div class="d-flex flex-row">
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b>Points </b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($pointsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <p class="mb-0">
                                    {{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}
                                </p>
                                <p class="mb-0" style="font-size: 12px;">
                                    ({{ $leader->teams->first()->fullName }})
                                </p>
                            </div>
                            <div>
                                <p> {{ $leader->ppg }} </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b> Rebounds </b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($reboundsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <p class="mb-0">
                                    {{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}
                                </p>
                                <p class="mb-0" style="font-size: 12px;">
                                    ({{ $leader->teams->first()->fullName }})
                                </p>
                            </div>
                            <div>
                                <p> {{ $leader->rpg }} </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b> Assists </b>(per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($assistsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <p class="mb-0">
                                    {{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}
                                </p>
                                <p class="mb-0" style="font-size: 12px;">
                                    ({{ $leader->teams->first()->fullName }})
                                </p>
                            </div>
                            <div>
                                <p> {{ $leader->apg }} </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b> Blocks </b>(per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($blocksLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <p class="mb-0">
                                    {{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}
                                </p>
                                <p class="mb-0" style="font-size: 12px;">
                                    ({{ $leader->teams->first()->fullName }})
                                </p>
                            </div>
                            <div>
                                <p> {{ $leader->bpg }} </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
