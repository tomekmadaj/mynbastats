@extends('layout.main')

@section('content')
    <div class="mb-4 d-flex flex-row">
        <h2>
            Hello {{ $user->name }}
        </h2>
        {{-- @if ($user->avatar)
            <!-- <img src="{{ Storage::url($user->avatar) }}" class="rounded mx-auto d-block user-avatar"> -->
            <img style="height: 40px" src="{{ asset('storage/' . $user->avatar) }}" class="rounded user-avatar">
        @else
            <img src="/images/avatar.png" class="rounded mx-auto d-block">
        @endif --}}
    </div>


    <div class="d-flex flex-row align-items-center">
        <div class="col-3 ">
            {{-- User Player --}}
            <div class="card" style="width: 18rem;">
                <p class="text-center"><b>{{ $player->firstName . ' ' . $player->lastName }}</b></p>
                <img src="{{ $playerImageUrl }}" class="rounded mx-auto d-block user-avatar">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Team: {{ $player->teams->fullName }}</li>
                        <li class="list-group-item">Position: {{ $player->pos }}</li>
                        <li class="list-group-item">Height: {{ $player->heightMeters }}m</li>
                        <li class="list-group-item">Weight: {{ $player->weightKilograms }}kg</li>
                        <li class="list-group-item">Nba debut: {{ $player->nbaDebutYear }}</li>
                        <li class="list-group-item">Years pro: {{ $player->yearsPro }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-9">

            {{-- Player Stats Season --}}
            @if (isset($playerSeasonStats->players))
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header container-fluid">
                            <div class="d-flex d-flex align-items-center">
                                <i class="fas fa-table mr-1"></i>
                                Player stats:
                                <b>
                                    {{ $playerSeasonStats->players->firstName . ' ' . $playerSeasonStats->players->lastName }}
                                </b>
                                - Season:
                                <form action="{{ route('nbaStats.dashboard') }}" class="mt-3 ms-4">
                                    <select id="seasonYear" name="seasonYear">
                                        @foreach ($playerSeasons ?? [] as $season)
                                            <option
                                                {{ $playerSeasonStats->seasonYear == $season->seasonYear ? 'selected' : '' }}
                                                value="{{ $season->seasonYear }}">
                                                {{ $season->seasonYear }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn-primary">Season change</button>
                                </form>
                            </div>
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
                                        <tr>
                                            <td> {{ $playerSeasonStats->teams->fullName }} </td>
                                            <td> {{ $playerSeasonStats->ppg }} </td>
                                            <td> {{ $playerSeasonStats->rpg }} </td>
                                            <td> {{ $playerSeasonStats->apg }} </td>
                                            <td> {{ $playerSeasonStats->mpg }} </td>
                                            <td> {{ $playerSeasonStats->spg }} </td>
                                            <td> {{ $playerSeasonStats->bpg }} </td>
                                            <td> {{ $playerSeasonStats->tpp }} </td>
                                            <td> {{ $playerSeasonStats->ftp }} </td>
                                            <td> {{ $playerSeasonStats->fgp }} </td>
                                            <td> {{ $playerSeasonStats->assists }} </td>
                                            <td> {{ $playerSeasonStats->blocks }} </td>
                                            <td> {{ $playerSeasonStats->steals }} </td>
                                            <td> {{ $playerSeasonStats->turnovers }} </td>
                                            <td> {{ $playerSeasonStats->offReb }} </td>
                                            <td> {{ $playerSeasonStats->defReb }} </td>
                                            <td> {{ $playerSeasonStats->totReb }} </td>
                                            <td> {{ $playerSeasonStats->fgm }} </td>
                                            <td> {{ $playerSeasonStats->fga }} </td>
                                            <td> {{ $playerSeasonStats->tpm }} </td>
                                            <td> {{ $playerSeasonStats->tpa }} </td>
                                            <td> {{ $playerSeasonStats->ftm }} </td>
                                            <td> {{ $playerSeasonStats->fta }} </td>
                                            <td> {{ $playerSeasonStats->pFouls }} </td>
                                            <td> {{ $playerSeasonStats->points }} </td>
                                            <td> {{ $playerSeasonStats->gamesPlayed }} </td>
                                            <td> {{ $playerSeasonStats->gamesStarted }} </td>
                                            <td> {{ $playerSeasonStats->plusMinus }} </td>
                                        </tr>
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
            @if (isset($playerCareerStats->first()->players))
                <div class="card mt-3">
                    <div class="card">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Player stats: <b>
                                {{ $playerCareerStats->players->firstName . ' ' . $playerCareerStats->players->lastName }}
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
                                        <tr>
                                            <td> {{ $playerCareerStats->teams->fullName }} </td>
                                            <td> {{ $playerCareerStats->ppg }} </td>
                                            <td> {{ $playerCareerStats->rpg }} </td>
                                            <td> {{ $playerCareerStats->apg }} </td>
                                            <td> {{ $playerCareerStats->mpg }} </td>
                                            <td> {{ $playerCareerStats->spg }} </td>
                                            <td> {{ $playerCareerStats->bpg }} </td>
                                            <td> {{ $playerCareerStats->tpp }} </td>
                                            <td> {{ $playerCareerStats->ftp }} </td>
                                            <td> {{ $playerCareerStats->fgp }} </td>
                                            <td> {{ $playerCareerStats->assists }} </td>
                                            <td> {{ $playerCareerStats->blocks }} </td>
                                            <td> {{ $playerCareerStats->steals }} </td>
                                            <td> {{ $playerCareerStats->turnovers }} </td>
                                            <td> {{ $playerCareerStats->offReb }} </td>
                                            <td> {{ $playerCareerStats->defReb }} </td>
                                            <td> {{ $playerCareerStats->totReb }} </td>
                                            <td> {{ $playerCareerStats->fgm }} </td>
                                            <td> {{ $playerCareerStats->fga }} </td>
                                            <td> {{ $playerCareerStats->tpm }} </td>
                                            <td> {{ $playerCareerStats->tpa }} </td>
                                            <td> {{ $playerCareerStats->ftm }} </td>
                                            <td> {{ $playerCareerStats->fta }} </td>
                                            <td> {{ $playerCareerStats->pFouls }} </td>
                                            <td> {{ $playerCareerStats->points }} </td>
                                            <td> {{ $playerCareerStats->gamesPlayed }} </td>
                                            <td> {{ $playerCareerStats->gamesStarted }} </td>
                                            <td> {{ $playerCareerStats->plusMinus }} </td>
                                        </tr>
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

    {{-- Latest 5 player games --}}
    <div class="card mt-5">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Latest games stats: <b>
                    {{ $player->firstName . ' ' . $player->lastName }}
                </b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th title='Game date'>date</th>
                                <th title='Opposing team'>Opposing team</th>
                                <th title='Points'>points</th>
                                <th title='Minutes'>min</th>
                                <th title='Field Goals made'>fgm</th>
                                <th title='Field Goals attempted'>fga</th>
                                <th title='Field goal percentage'>fg%</th>
                                <th title='Free throws made'>ftm</th>
                                <th title='Free throws attempted'>fta</th>
                                <th title='Free throw percentage'>ft%</th>
                                <th title='3-point made'>3pm</th>
                                <th title='3-point attempted'>3pa</th>
                                <th title='3-point percentage'>3p%</th>
                                <th title='Ofensive rebounds'>offReb</th>
                                <th title='Defensive rebounds'>defReb</th>
                                <th title='Total rebounds'>totReb</th>
                                <th title='Assists'>assists</th>
                                <th title='Steals'>steals</th>
                                <th title='Blocks'>blocks</th>
                                <th title='Turnovers'>turnovers</th>
                                <th title='Personal fouls'>pFouls</th>
                                <th title='Plus minus'>plus minus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestPlayerStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->date }} </td>
                                    @if ($stat->schedule->vTeams->teamId != $stat->teamId)
                                        <td> {{ $stat->schedule->vTeams->fullName }} </td>
                                    @elseif ($stat->schedule->hTeams->teamId != $stat->teamId)
                                        <td> {{ $stat->schedule->hTeams->fullName }} </td>
                                    @endif
                                    <td> {{ $stat->points }} </td>
                                    <td> {{ $stat->min }} </td>
                                    <td> {{ $stat->fgm }} </td>
                                    <td> {{ $stat->fga }} </td>
                                    <td> {{ $stat->fgp }} </td>
                                    <td> {{ $stat->ftm }} </td>
                                    <td> {{ $stat->fta }} </td>
                                    <td> {{ $stat->ftp }} </td>
                                    <td> {{ $stat->tpm }} </td>
                                    <td> {{ $stat->tpa }} </td>
                                    <td> {{ $stat->tpp }} </td>
                                    <td> {{ $stat->offReb }} </td>
                                    <td> {{ $stat->defReb }} </td>
                                    <td> {{ $stat->totReb }} </td>
                                    <td> {{ $stat->assists }} </td>
                                    <td> {{ $stat->steals }} </td>
                                    <td> {{ $stat->blocks }} </td>
                                    <td> {{ $stat->turnovers }} </td>
                                    <td> {{ $stat->pFouls }} </td>
                                    <td> {{ $stat->plusMinus }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}
                            </p>
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
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}
                            </p>
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
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}
                            </p>
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
                            <p>{{ $leader->players->firstName . ' ' . $leader->players->lastName }}
                            </p>
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
            <div class="card-header"><i class="fas fa-table mr-1"></i>Players stats: <b>
                    {{ $team->fullName }}
                </b> (totals)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            <div class="card-header"><i class="fas fa-table mr-1"></i>Players stats: <b>
                    {{ $team->fullName }}
                </b> (per game)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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

    {{-- Total team stats --}}
    <h5 class="mt-5 mb-4">
        <img style="height: 30px; padding-bottom:5px" src="/images/NbaLogos/{{ $team->teamId }}.png"
            class="mx-auto rounded">
        <b> 2021-2022 {{ $team->fullName }} Team Stats</b>
    </h5>
    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Team stats: <b>
                    {{ $teamStats->teams->fullName }}
                </b> (averages)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
@endsection
