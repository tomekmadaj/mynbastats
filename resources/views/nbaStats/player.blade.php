@extends('layout.main')

@section('content')
<div class="d-flex flex-row align-items-center mt-3">
    <div class="col-3 ">
        {{-- User Player --}}
        <div class="card" style="width: 18rem;">
            <p class="text-center"><b>{{ $user->players->firstName . ' ' . $user->players->lastName }}</b></p>
            <img src="{{ $playerImageUrl['playerImgFileUrl'] }}" class="rounded mx-auto d-block user-avatar">
            <a href="{{ $playerImageUrl['imgFileSrc'] }}" target="_blank" class="text-center" style="font-size: 10px">
                (img source)</a>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Team: {{ $user->teams->fullName }}</li>
                    <li class="list-group-item">Position: {{ $user->players->pos }}</li>
                    <li class="list-group-item">Height: {{ $user->players->heightMeters }}m</li>
                    <li class="list-group-item">Weight: {{ $user->players->weightKilograms }}kg</li>
                    <li class="list-group-item">Nba debut: {{ $user->players->nbaDebutYear }}</li>
                    <li class="list-group-item">Years pro: {{ $user->players->yearsPro }}</li>
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
                        <form action="{{ route('nbaStats.playerDashboard') }}" class="mt-3 ms-4">
                            <select id="seasonYear" name="seasonYear">
                                @foreach ($playerSeasons ?? [] as $season)
                                <option {{ $playerSeasonStats->seasonYear == $season->seasonYear ? 'selected' : '' }} value="{{ $season->seasonYear }}">
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
        @if (isset($playerCareerStats->players))
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
            There's no career stats for player: {{ $user->players->firstName . ' ' . $user->players->lastName }}
        </div>
        @endif
    </div>
</div>

{{-- Latest 5 player games --}}
<div class="card mt-5">
    <div class="card">
        <div class="card-header"><i class="fas fa-table mr-1"></i><b>
                {{ $user->players->firstName . ' ' . $user->players->lastName }}
            </b> - latest games stats:
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

@endsection
