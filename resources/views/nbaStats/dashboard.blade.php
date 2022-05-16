@extends('layout.main')

@section('content')
    <div class="mb-4 d-flex flex-row">
        <h2>
            Hello {{ $user->name }}
        </h2>
        @if ($user->avatar)
            <!-- <img src="{{ Storage::url($user->avatar) }}" class="rounded mx-auto d-block user-avatar"> -->
            <img style="height: 40px" src="{{ asset('storage/' . $user->avatar) }}" class="rounded user-avatar">
        @else
            <img src="/images/avatar.png" class="rounded mx-auto d-block">
        @endif
    </div>


    <div class="d-flex flex-row align-items-center">
        <div class="col-4 ">
            {{-- User Player --}}
            <div class="card mb-5" style="width: 18rem;">
                <p class="text-center"><b>{{ $player->firstName . ' ' . $player->lastName }}</b></p>
                <img src="{{ $playerImageUrl }}" class="rounded mx-auto d-block user-avatar">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Position: {{ $player->pos }}</li>
                        <li class="list-group-item">Height: {{ $player->heightMeters }}m</li>
                        <li class="list-group-item">Weight: {{ $player->weightKilograms }}kg</li>
                        <li class="list-group-item">Nba debut: {{ $player->nbaDebutYear }}</li>
                        <li class="list-group-item">Years pro: {{ $player->yearsPro }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-8 pt-4">
            {{-- Player Stats Season --}}
            <p>Player Season Stats</p>
            @if (isset($playerSeasonStats->first()->players))
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>
                            Player stats: <b>
                                {{ $playerSeasonStats->first()->players->first()->firstName . ' ' . $playerSeasonStats->first()->players->first()->lastName }}
                            </b>
                            - Season:

                            <form action="{{ route('nbaStats.dashboard') }}">
                                <select id="seasonYear" name="seasonYear">
                                    @foreach ($playerSeasons ?? [] as $season)
                                        <option
                                            {{ $playerSeasonStats->first()->seasonYear == $season->seasonYear ? 'selected' : '' }}
                                            value="{{ $season->seasonYear }}">
                                            {{ $season->seasonYear }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary ms-3">Season change</button>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Team</th>
                                            <th title='Points per game'>ppg</th>
                                            <th title='Rebounds per game'>rpg</th>
                                            <th title='Assists per game'>apg</th>
                                            <th title='Turnovers per game'>mpg</th>
                                            <th title='Minutes per game'>mpg</th>
                                            <th title='Steals per game'>spg</th>
                                            <th title='Blocks per game'>bpg</th>
                                            <th title='3-point percentage'>3p%</th>
                                            <th title='Free throw percentage'>ft%</th>
                                            <th title='Field goal percentage'>fg%</th>
                                            <th title='Assists'>assists</th>
                                            <th title='Blocks'>blocks</th>
                                            <th title='Steals'>steals</th>
                                            <th title='Turnovers'>turnovers</th>
                                            <th title='Ofensive rebounds'>offReb</th>
                                            <th title='Defensive rebounds'>defReb</th>
                                            <th title='Total rebounds'>totReb</th>
                                            <th title='Field Goals made'>fgm</th>
                                            <th title='Field Goals attempted'>fga</th>
                                            <th title='3-point made'>3pm</th>
                                            <th title='3-point attempted'>3pa</th>
                                            <th title='Free throws made'>ftm</th>
                                            <th title='Free throws attempted'>fta</th>
                                            <th title='Personal fouls'>pFouls</th>
                                            <th title='Points'>points</th>
                                            <th title='Games played'>games played</th>
                                            <th title='Games started'>games stared</th>
                                            <th title='Plus minus'>plus minus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($playerSeasonStats ?? [] as $stat)
                                            <tr>
                                                <td> {{ $stat->teams->first()->fullName }} </td>
                                                <td> {{ $stat->ppg }} </td>
                                                <td> {{ $stat->rpg }} </td>
                                                <td> {{ $stat->apg }} </td>
                                                <td> {{ $stat->mpg }} </td>
                                                <td> {{ $stat->topg }} </td>
                                                <td> {{ $stat->spg }} </td>
                                                <td> {{ $stat->bpg }} </td>
                                                <td> {{ $stat->tpp }} </td>
                                                <td> {{ $stat->ftp }} </td>
                                                <td> {{ $stat->fgp }} </td>
                                                <td> {{ $stat->assists }} </td>
                                                <td> {{ $stat->blocks }} </td>
                                                <td> {{ $stat->steals }} </td>
                                                <td> {{ $stat->turnovers }} </td>
                                                <td> {{ $stat->offReb }} </td>
                                                <td> {{ $stat->defReb }} </td>
                                                <td> {{ $stat->totReb }} </td>
                                                <td> {{ $stat->fgm }} </td>
                                                <td> {{ $stat->fga }} </td>
                                                <td> {{ $stat->tpm }} </td>
                                                <td> {{ $stat->tpa }} </td>
                                                <td> {{ $stat->ftm }} </td>
                                                <td> {{ $stat->fta }} </td>
                                                <td> {{ $stat->pFouls }} </td>
                                                <td> {{ $stat->points }} </td>
                                                <td> {{ $stat->gamesPlayed }} </td>
                                                <td> {{ $stat->gamesStarted }} </td>
                                                <td> {{ $stat->plusMinus }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    There's no season stats for player: {{ $player->firstName . ' ' . $player->lastName }}
                </div>
            @endif
            {{-- Player Stats Career --}}
            <p class="mt-3">Player Career Stats</p>
            @if (isset($playerCareerStats->first()->players))
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Player stats: <b>
                                {{ $playerCareerStats->first()->players->first()->firstName . ' ' . $playerCareerStats->first()->players->first()->lastName }}
                            </b>
                            - Career summary </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Current Team</th>
                                            <th title='Points per game'>ppg</th>
                                            <th title='Rebounds per game'>rpg</th>
                                            <th title='Assists per game'>apg</th>
                                            <th title='Minutes per game'>mpg</th>
                                            <th title='Steals per game'>spg</th>
                                            <th title='Blocks per game'>bpg</th>
                                            <th title='3-point percentage'>3p%</th>
                                            <th title='Free throw percentage'>ft%</th>
                                            <th title='Field goal percentage'>fg%</th>
                                            <th title='Assists'>assists</th>
                                            <th title='Blocks'>blocks</th>
                                            <th title='Steals'>steals</th>
                                            <th title='Turnovers'>turnovers</th>
                                            <th title='Ofensive rebounds'>offReb</th>
                                            <th title='Defensive rebounds'>defReb</th>
                                            <th title='Total rebounds'>totReb</th>
                                            <th title='Field Goals made'>fgm</th>
                                            <th title='Field Goals attempted'>fga</th>
                                            <th title='3-point made'>3pm</th>
                                            <th title='3-point attempted'>3pa</th>
                                            <th title='Free throws made'>ftm</th>
                                            <th title='Free throws attempted'>fta</th>
                                            <th title='Personal fouls'>pFouls</th>
                                            <th title='Points'>points</th>
                                            <th title='Games played'>games played</th>
                                            <th title='Games started'>games stared</th>
                                            <th title='Plus minus'>plus minus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($playerCareerStats ?? [] as $stat)
                                            <tr>
                                                <td> {{ $stat->teams->first()->fullName }} </td>
                                                <td> {{ $stat->ppg }} </td>
                                                <td> {{ $stat->rpg }} </td>
                                                <td> {{ $stat->apg }} </td>
                                                <td> {{ $stat->spg }} </td>
                                                <td> {{ $stat->bpg }} </td>
                                                <td> {{ $stat->tpp }} </td>
                                                <td> {{ $stat->ftp }} </td>
                                                <td> {{ $stat->mpg }} </td>
                                                <td> {{ $stat->fgp }} </td>
                                                <td> {{ $stat->assists }} </td>
                                                <td> {{ $stat->blocks }} </td>
                                                <td> {{ $stat->steals }} </td>
                                                <td> {{ $stat->turnovers }} </td>
                                                <td> {{ $stat->offReb }} </td>
                                                <td> {{ $stat->defReb }} </td>
                                                <td> {{ $stat->totReb }} </td>
                                                <td> {{ $stat->fgm }} </td>
                                                <td> {{ $stat->fga }} </td>
                                                <td> {{ $stat->tpm }} </td>
                                                <td> {{ $stat->tpa }} </td>
                                                <td> {{ $stat->ftm }} </td>
                                                <td> {{ $stat->fta }} </td>
                                                <td> {{ $stat->pFouls }} </td>
                                                <td> {{ $stat->points }} </td>
                                                <td> {{ $stat->gamesPlayed }} </td>
                                                <td> {{ $stat->gamesStarted }} </td>
                                                <td> {{ $stat->plusMinus }} </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    There's no career stats for player: {{ $player->firstName . ' ' . $player->lastName }}
                </div>
            @endif
        </div>
    </div>

    {{-- User Team Leaders --}}
    <h5 class="mt-5 mb-4">
        <img style="height: 30px; padding-bottom:5px" src="/images/NbaLogos/{{ $team->teamId }}.png"
            class="mx-auto rounded">
        <b> 2021-2022 {{ $team->fullName }} Regular Season Leaders</b>
    </h5>

    <div class="d-flex flex-row">
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b> Points </b>(per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($pointsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}</p>
                            <p> {{ $leader->ppg }} </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b> Rebounds </b>(per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($reboundsLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}</p>
                            <p> {{ $leader->rpg }} </p>
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
                            <p>{{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}</p>
                            <p> {{ $leader->apg }} </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <b> Blocks </b> (per game)
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($blocksLeaders as $leader)
                        <li class="list-group-item d-flex justify-content-between">
                            <p>{{ $leader->players->first()->firstName . ' ' . $leader->players->first()->lastName }}</p>
                            <p> {{ $leader->bpg }} </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    {{-- team stats totals --}}
    <h5 class="mt-5 mb-4">
        <img style="height: 30px; padding-bottom:5px" src="/images/NbaLogos/{{ $team->teamId }}.png"
            class="mx-auto rounded">
        <b> 2021-2022 {{ $team->fullName }} Regular Season Player Stats</b>
    </h5>
    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Player stats: <b>
                    {{ $teamStats->first()->teams->fullName }}
                </b> (totals)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th title='Games played'>games</th>
                                <th title='Minutes'>min</th>
                                <th title='Field goals made'>fgm</th>
                                <th title='Field goals attempted'>fga</th>
                                <th title='Free thorws made'>ftm</th>
                                <th title='Free thorws attempted'>fta</th>
                                <th title='3-points made'>3pm</th>
                                <th title='3-points attempted'>3pa</th>
                                <th title='Assists'>assists</th>
                                <th title='Rebounds'>rebounds</th>
                                <th title='Steals'>steals</th>
                                <th title='Blocks'>blocks</th>
                                <th title='Turnovers'>turnovers</th>
                                <th title='Plus Minus'>plus minus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamPlayersStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->players->first()->firstName . ' ' . $stat->players->first()->lastName }}
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
            <div class="card-header"><i class="fas fa-table mr-1"></i>Player stats: <b>
                    {{ $teamStats->first()->teams->fullName }}
                </b> (per game)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th title='Games played'>games</th>
                                <th title='Minutes'>min</th>
                                <th title='Points'>points</th>
                                <th title='Field goals percentage'>fg%</th>
                                <th title='Free throws percentage'>ft%</th>
                                <th title='3-points percentage'>3p%</th>
                                <th title='Rebouds'>rebounds</th>
                                <th title='Assists'>assists</th>
                                <th title='Blocks'>blocks</th>
                                <th title='Steals'>steals</th>
                                <th title='Turnovers'>turnovers</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamPlayersStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->players->first()->firstName . ' ' . $stat->players->first()->lastName }}
                                    </td>
                                    <td> {{ $stat->gamesPlayed }} </td>
                                    <td> {{ $stat->mpg }} </td>
                                    <td> {{ $stat->ppg }} </td>
                                    <td> {{ $stat->fgp }} </td>
                                    <td> {{ $stat->ftp }} </td>
                                    <td> {{ $stat->tpp }} </td>
                                    <td> {{ $stat->rpg }} </td>
                                    <td> {{ $stat->apg }} </td>
                                    <td> {{ $stat->bpg }} </td>
                                    <td> {{ $stat->stp }} </td>
                                    <td> {{ $stat->tpg }} </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Total team stats --}}
    <p class="mt-5">Team Stats</p>
    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Team stats: <b>
                    {{ $teamStats->first()->teams->fullName }}
                </b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>min_avg</th>
                                <th>min_rank</th>
                                <th>fgp_avg</th>
                                <th>fgp_rank</th>
                                <th>tpp_avg</th>
                                <th>tpp_rank</th>
                                <th>ftp_avg</th>
                                <th>ftp_rank</th>
                                <th>orpg_avg</th>
                                <th>orpg_rank</th>
                                <th>drpg_avg</th>
                                <th>drpg_rank</th>
                                <th>trpg_avg</th>
                                <th>trpg_rank</th>
                                <th>apg_avg</th>
                                <th>apg_rank</th>
                                <th>tpg_avg</th>
                                <th>tpg_rank</th>
                                <th>spg_avg</th>
                                <th>spg_rank</th>
                                <th>bpg_avg</th>
                                <th>bpg_rank</th>
                                <th>pfpg_avg</th>
                                <th>pfpg_rank</th>
                                <th>ppg_avg</th>
                                <th>ppg_rank</th>
                                <th>oppg_avg</th>
                                <th>oppg_rank</th>
                                <th>eff_avg</th>
                                <th>eff_rank</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->teams->fullName }} </td>
                                    <td> {{ $stat->min_avg }} </td>
                                    <td> {{ $stat->min_rank }} </td>
                                    <td> {{ $stat->fgp_avg }} </td>
                                    <td> {{ $stat->fgp_rank }} </td>
                                    <td> {{ $stat->tpp_avg }} </td>
                                    <td> {{ $stat->tpp_rank }} </td>
                                    <td> {{ $stat->ftp_avg }} </td>
                                    <td> {{ $stat->ftp_rank }} </td>
                                    <td> {{ $stat->orpg_avg }} </td>
                                    <td> {{ $stat->orpg_rank }} </td>
                                    <td> {{ $stat->drpg_avg }} </td>
                                    <td> {{ $stat->drpg_rank }} </td>
                                    <td> {{ $stat->trpg_avg }} </td>
                                    <td> {{ $stat->trpg_rank }} </td>
                                    <td> {{ $stat->apg_avg }} </td>
                                    <td> {{ $stat->apg_rank }} </td>
                                    <td> {{ $stat->tpg_avg }} </td>
                                    <td> {{ $stat->tpg_rank }} </td>
                                    <td> {{ $stat->spg_avg }} </td>
                                    <td> {{ $stat->spg_rank }} </td>
                                    <td> {{ $stat->bpg_avg }} </td>
                                    <td> {{ $stat->bpg_rank }} </td>
                                    <td> {{ $stat->pfpg_avg }} </td>
                                    <td> {{ $stat->pfpg_rank }} </td>
                                    <td> {{ $stat->ppg_avg }} </td>
                                    <td> {{ $stat->ppg_rank }} </td>
                                    <td> {{ $stat->oppg_avg }} </td>
                                    <td> {{ $stat->oppg_rank }} </td>
                                    <td> {{ $stat->eff_avg }} </td>
                                    <td> {{ $stat->eff_rank }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
