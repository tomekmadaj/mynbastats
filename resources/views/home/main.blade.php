@extends('layout.main')

@section('content')
    <h2 class="pt-1">Hej hej tu NBA</h2>
    @auth
        <p>Elo {{ $user->name }}</p>
    @endauth

    {{-- latest games --}}
    <h5 class="mt-5">
        <img style="height: 30px" src="/images/NbaLogos/NBA-logo.png" class="mx-auto rounded">
        <b> Latest NBA games</b>
    </h5>

    <div class="row">
        @foreach ($latestGames as $game)
            <div class="col-4">
                <div class="card">
                    <div class="text-center pt-1" style="font-size: 12px;"> {{ $game->date }}</div>
                    <div class=" card-body py-3 px-0">
                        <div class="d-flex flex-row">
                            <div id="hTeam" class="col-6 d-flex justify-content-between">
                                <h6 class="card-title"> <img style="height: 30px; padding-bottom:5px"
                                        src="/images/NbaLogos/{{ $game->hTeams->teamId }}.png"
                                        class="mx-auto rounded">{{ $game->hTeams->fullName }} </h6>
                                <p>{{ $game->hTeamScore }}</p>
                            </div>
                            <div id="vTeam" class="col-6 d-flex justify-content-between">
                                <p>{{ $game->vTeamScore }}</p>
                                <h6 class="card-title"> <img style="height: 30px; padding-bottom:5px"
                                        src="/images/NbaLogos/{{ $game->vTeams->teamId }}.png" class="mx-auto rounded">
                                    {{ $game->vTeams->fullName }}</h6>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush" style="font-size: 12px;">
                        <li class="list-group-item text-center">Point leaders</li>
                        <li class="list-group-item pb-0">
                            <div class="row mb-0 pb-0">
                                <div class="col-6 d-flex justify-content-between">
                                    <p>{{ $game->hTeamsLeaders->pFirstName . ' ' . $game->hTeamsLeaders->pLastName }}
                                    </p>
                                    <p>{{ $game->hTeamsLeaders->points }}</p>
                                </div>
                                <div class="col-6 d-flex justify-content-between">
                                    <p>{{ $game->vTeamsLeaders->points }}</p>
                                    <p>{{ $game->vTeamsLeaders->pFirstName . ' ' . $game->vTeamsLeaders->pLastName }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item text-center">Assists leaders</li>
                        <li class="list-group-item pb-0">
                            <div class="row mb-0 pb-0">
                                <div class="col-6 d-flex justify-content-between">
                                    <p>{{ $game->hTeamsLeaders->aFirstName . ' ' . $game->hTeamsLeaders->aLastName }}
                                    </p>
                                    <p>{{ $game->hTeamsLeaders->assists }}</p>
                                </div>
                                <div class="col-6 d-flex justify-content-between">
                                    <p>{{ $game->vTeamsLeaders->assists }}</p>
                                    <p>{{ $game->vTeamsLeaders->aFirstName . ' ' . $game->vTeamsLeaders->aLastName }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item text-center">Rebounds leaders</li>
                        <li class="list-group-item pb-0">
                            <div class="row mb-0 pb-0">
                                <div class="col-6 d-flex justify-content-between">
                                    <p>{{ $game->hTeamsLeaders->rFirstName . ' ' . $game->hTeamsLeaders->rLastName }}
                                    </p>
                                    <p>{{ $game->hTeamsLeaders->rebounds }}</p>
                                </div>
                                <div class="col-6 d-flex justify-content-between">
                                    <p>{{ $game->vTeamsLeaders->rebounds }}</p>
                                    <p>{{ $game->vTeamsLeaders->rFirstName . ' ' . $game->vTeamsLeaders->rLastName }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    {{-- last games stats --}}
    <h5 class="mt-5 mb-4">
        <img style="height: 30px" src="/images/NbaLogos/NBA-logo.png" class="mx-auto rounded">
        <b> Latest NBA games stats</b>
    </h5>
    @foreach ($latestGames as $game)
        <div class="card mt-3">
            <div class="card">
                <div class="card-header"><i class="fas fa-table mr-1"></i>
                    <b> {{ $game->hTeams->fullName }} vs {{ $game->vTeams->fullName }} </b>
                    ({{ $game->date }})
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th title='Team'>Team</th>
                                    <th title='Score'>points</th>
                                    <th title='Field goals made'>fgm</th>
                                    <th title='Field goals attempted'>fga</th>
                                    <th title='Field goals percentage'>fgp</th>
                                    <th title='Free thorws made'>ftm</th>
                                    <th title='Free thorws attempted'>fta</th>
                                    <th title='Free throws percentage'>ftp</th>
                                    <th title='3-points made'>3pm</th>
                                    <th title='3-points attempted'>3pa</th>
                                    <th title='3-points percentage'>3pp</th>
                                    <th title='Ofensive rebounds'>offReb</th>
                                    <th title='Defensive rebounds'>defReb</th>
                                    <th title='Total rebounds'>totReb</th>
                                    <th title='Assists'>assists</th>
                                    <th title='Personal fouls'>pFouls</th>
                                    <th title='Steals'>steals</th>
                                    <th title='Turnovers'>turnovers</th>
                                    <th title='Blocks'>blocks</th>
                                    <th title='Plus Minus'>plus minus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 2; $i++)
                                    @if ($i == 0)
                                        @php
                                            $teamBoxscore = 'hTeamsBoxscore';
                                            $team = 'hTeams';
                                        @endphp
                                    @elseif ($i == 1)
                                        @php
                                            $teamBoxscore = 'vTeamsBoxscore';
                                            $team = 'vTeams';
                                        @endphp
                                    @endif
                                    <tr>
                                        <td> {{ $game->$team->fullName }}</td>
                                        <td> {{ $game->$teamBoxscore->points }} </td>
                                        <td> {{ $game->$teamBoxscore->fgm }} </td>
                                        <td> {{ $game->$teamBoxscore->fga }} </td>
                                        <td> {{ $game->$teamBoxscore->fgp }} </td>
                                        <td> {{ $game->$teamBoxscore->ftm }} </td>
                                        <td> {{ $game->$teamBoxscore->fta }} </td>
                                        <td> {{ $game->$teamBoxscore->ftp }} </td>
                                        <td> {{ $game->$teamBoxscore->tpm }} </td>
                                        <td> {{ $game->$teamBoxscore->tpa }} </td>
                                        <td> {{ $game->$teamBoxscore->tpp }} </td>
                                        <td> {{ $game->$teamBoxscore->offReb }} </td>
                                        <td> {{ $game->$teamBoxscore->defReb }} </td>
                                        <td> {{ $game->$teamBoxscore->totReb }} </td>
                                        <td> {{ $game->$teamBoxscore->assists }} </td>
                                        <td> {{ $game->$teamBoxscore->pFouls }} </td>
                                        <td> {{ $game->$teamBoxscore->steals }} </td>
                                        <td> {{ $game->$teamBoxscore->turnovers }} </td>
                                        <td> {{ $game->$teamBoxscore->blocks }} </td>
                                        <td> {{ $game->$teamBoxscore->plusMinus }} </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- standings --}}
    <h5 class="mt-5">
        <img style="height: 30px" src="/images/NbaLogos/NBA-logo.png" class="mx-auto rounded">
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
        <img style="height: 30px" src="/images/NbaLogos/NBA-logo.png" class="mx-auto rounded">
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
