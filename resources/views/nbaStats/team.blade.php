@extends('layout.main')

@section('content')
    <h5 class="mt-3">
        <img style="height: 30px; padding-bottom:5px" src="/images/NbaLogos/{{ $user->teams->teamId }}.png"
        class="mx-auto rounded">
        <b> {{ $user->teams->fullName }} latest games</b>
    </h5>
    <div id="scoreboard" class="row">
        @foreach ($latestUserTeamGames as $game)
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card mt-xl-0 mt-md-0 mt-5">
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
        <img style="height: 30px; padding-bottom:5px" src="/images/NbaLogos/{{ $user->teams->teamId }}.png"
        class="mx-auto rounded">
        <b>{{ $user->teams->fullName }} latest games stats</b>
    </h5>
    @foreach ($latestUserTeamGames as $game)
        <div id="gamesStats" class="card mt-3">
            <div class="card">
                <div class="card-header"><i class="fas fa-table mr-1"></i>
                    <b> {{ $game->hTeams->fullName }} vs {{ $game->vTeams->fullName }} </b>
                    ({{ $game->date }})
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th title='Team' style="width:230px">Team</th>
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
                                            $teamId = 'hTeams';
                                        @endphp
                                    @elseif ($i == 1)
                                        @php
                                            $teamBoxscore = 'vTeamsBoxscore';
                                            $teamId = 'vTeams';
                                        @endphp
                                    @endif
                                    <tr>
                                        <td> {{ $game->$teamId->fullName }}</td>
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

    {{-- User Team Leaders --}}
    <h5 class="mt-5 mb-4">
        <img style="height: 30px; padding-bottom:5px" src="/images/NbaLogos/{{ $user->teams->teamId }}.png"
            class="mx-auto rounded">
        <b> 2021-2022 {{ $user->teams->fullName }} Regular Season Leaders</b>
    </h5>
    <div id="leaders" class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <b>Points</b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($pointsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}</p>
                            <p>{{ $leader->ppg }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card mt-xl-0 mt-lg-0 mt-3">
                <div class="card-header">
                    <b>Rebounds</b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($reboundsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}</p>
                            <p>{{ $leader->rpg }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card mt-xl-0 mt-lg-3 mt-3">
                <div class="card-header">
                    <b>Assists</b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($assistsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}</p>
                            <p>{{ $leader->apg }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card mt-xl-0 mt-lg-3 mt-3">
                <div class="card-header">
                    <b>Blocks</b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($blocksLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}</p>
                            <p>{{ $leader->bpg }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

     {{-- Total team stats --}}
     <h5 class="mt-5 mb-4">
        <img class="mx-auto rounded" style="height: 30px; padding-bottom:5px"
            src="/images/NbaLogos/{{ $user->teams->teamId }}.png">
        <b>2021-2022 {{ $user->teams->fullName }} Team Stats</b>
    </h5>
    <div class="card mt-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>Team stats:
                <b>{{ $teamStats->teams->fullName }}</b> (averages)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Team Name</th>
                                <th title='Points'>ppg</th>
                                <th title='Minutes'>min</th>
                                <th title='Field goals percentage'>fgp</th>
                                <th title='3-points percentage'>tpp</th>
                                <th title='Free throws percentage'>ftp</th>
                                <th title='Offensive Rebouds'>orpg</th>
                                <th title='Defensive Rebouds'>drpg</th>
                                <th title='Total Rebouds'>trpg</th>
                                <th title='Assists'>apg</th>
                                <th title='Turnovers'>tpg</th>
                                <th title='Steals'>spg</th>
                                <th title='Blocks'>bpg</th>
                                <th>pfpg</th>
                                <th>oppg</th>
                                <th>eff</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{ $teamStats->teams->fullName }} </td>
                                <td> {{ $teamStats->ppg_avg }} </td>
                                <td> {{ $teamStats->min_avg }} </td>
                                <td> {{ $teamStats->fgp_avg }} </td>
                                <td> {{ $teamStats->tpp_avg }} </td>
                                <td> {{ $teamStats->ftp_avg }} </td>
                                <td> {{ $teamStats->orpg_avg }} </td>
                                <td> {{ $teamStats->drpg_avg }} </td>
                                <td> {{ $teamStats->trpg_avg }} </td>
                                <td> {{ $teamStats->apg_avg }} </td>
                                <td> {{ $teamStats->tpg_avg }} </td>
                                <td> {{ $teamStats->spg_avg }} </td>
                                <td> {{ $teamStats->bpg_avg }} </td>
                                <td> {{ $teamStats->pfpg_avg }} </td>
                                <td> {{ $teamStats->oppg_avg }} </td>
                                <td> {{ $teamStats->eff_avg }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- team stats totals --}}
    <h5 class="mt-5 mb-4">
        <img class="mx-auto rounded" style="height: 30px; padding-bottom:5px"
            src="/images/NbaLogos/{{ $user->teams->teamId }}.png">
        <b>2021-2022 {{ $user->teams->fullName }} Regular Season Player Stats</b>
    </h5>
    <div class="card mt-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>Players stats: <b>{{ $user->teams->fullName }}</b> (totals)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th title='Games played'>@sortablelink('gamesPlayed', 'games')</th>
                                <th title='Minutes'> @sortablelink('min')</th>
                                <th title='Field goals made'> @sortablelink('fgm')</th>
                                <th title='Field goals attempted'> @sortablelink('fga')</th>
                                <th title='Free thorws made'> @sortablelink('ftm')</th>
                                <th title='Free thorws attempted'> @sortablelink('fta')</th>
                                <th title='3-points made'> @sortablelink('tpm', '3pm')</th>
                                <th title='3-points attempted'> @sortablelink('tpa', '3pa')</th>
                                <th title='Assists'> @sortablelink('assists')</th>
                                <th title='Rebounds'> @sortablelink('rebounds')</th>
                                <th title='Steals'> @sortablelink('steals')</th>
                                <th title='Blocks'> @sortablelink('blocks')</th>
                                <th title='Turnovers'> @sortablelink('turnovers')</th>
                                <th title='Plus Minus'>@sortablelink('plusMinus', 'plus minus')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamPlayersStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->players->firstName . ' ' . $stat->players->lastName }}
                                    </td>
                                    <td> {{ $stat->gamesPlayed }} </td>
                                    <td> {{ $stat->min }} </td>
                                    <td> {{ $stat->fgm }} </td>
                                    <td> {{ $stat->fga }} </td>
                                    <td> {{ $stat->ftm }} </td>
                                    <td> {{ $stat->fta }} </td>
                                    <td> {{ $stat->tpm }} </td>
                                    <td> {{ $stat->tpa }} </td>
                                    <td> {{ $stat->assists }} </td>
                                    <td> {{ $stat->totReb }} </td>
                                    <td> {{ $stat->steals }} </td>
                                    <td> {{ $stat->blocks }} </td>
                                    <td> {{ $stat->turnovers }} </td>
                                    <td> {{ $stat->plusMinus }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- team stats per game --}}
    <div class="card mt-3">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>Players stats: <b>{{ $user->teams->fullName }}</b> (per game)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th title='Games played'> @sortablelink('gamesPlayed', 'games')</th>
                                <th title='Minutes'> @sortablelink('min')</th>
                                <th title='Points'> @sortablelink('points')</th>
                                <th title='Field goals percentage'> @sortablelink('fgp', 'fg%')</th>
                                <th title='Free throws percentage'> @sortablelink('ftp', 'ft%')</th>
                                <th title='3-points percentage'> @sortablelink('tpp', '3p%')</th>
                                <th title='Rebouds'> @sortablelink('rebounds')</th>
                                <th title='Assists'> @sortablelink('assists')</th>
                                <th title='Blocks'> @sortablelink('blocks')</th>
                                <th title='Steals'> @sortablelink('steals')</th>
                                <th title='Turnovers'> @sortablelink('turnovers')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamPlayersStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->players->firstName . ' ' . $stat->players->lastName }} </td>
                                    <td> {{ $stat->gamesPlayed }} </td>
                                    <td> {{ $stat->mpg }} </td>
                                    <td> {{ $stat->ppg }} </td>
                                    <td> {{ $stat->fgp }} </td>
                                    <td> {{ $stat->ftp }} </td>
                                    <td> {{ $stat->tpp }} </td>
                                    <td> {{ $stat->rpg }} </td>
                                    <td> {{ $stat->apg }} </td>
                                    <td> {{ $stat->bpg }} </td>
                                    <td> {{ $stat->spg }} </td>
                                    <td> {{ $stat->topg }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
