@extends('layout.main')

@section('content')
    <h2 class="pt-1">Hej hej tu NBA</h2>
    @auth
        <p>Elo {{ $user->name }}</p>
    @endauth

    {{-- standings --}}
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
                                            <td>{{ $standing->teams->fullName }}</td>
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
                                            <td>{{ $standing->teams->fullName }}</td>
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

    {{-- player stats --}}
    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Player stats: <b>
                    {{ $playerStats->first()->players->first()->firstName . ' ' . $playerStats->first()->players->first()->lastName }}
                </b>
                (season {{ $playerStats->first()->seasonYear }}) </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>ppg</th>
                                <th>rpg</th>
                                <th>apg</th>
                                <th>mpg</th>
                                <th>topg</th>
                                <th>spg</th>
                                <th>bpg</th>
                                <th>tpp</th>
                                <th>ftp</th>
                                <th>fgp</th>
                                <th>assists</th>
                                <th>blocks</th>
                                <th>steals</th>
                                <th>turnovers</th>
                                <th>offReb</th>
                                <th>defReb</th>
                                <th>toReb</th>
                                <th>fgm</th>
                                <th>fga</th>
                                <th>tpm</th>
                                <th>tpa</th>
                                <th>ftm</th>
                                <th>fta</th>
                                <th>pFouls</th>
                                <th>points</th>
                                <th>games played</th>
                                <th>games stared</th>
                                <th>plus minus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($playerStats ?? [] as $stat)
                                <tr>
                                    <td> {{ $stat->teams->first()->fullName }} </td>
                                    <td> {{ $stat->ppg }} </td>
                                    <td> {{ $stat->rpg }} </td>
                                    <td> {{ $stat->apg }} </td>
                                    <td>{{ $stat->mpg }} </td>
                                    <td>{{ $stat->topg }} </td>
                                    <td>{{ $stat->spg }} </td>
                                    <td>{{ $stat->bpg }} </td>
                                    <td>{{ $stat->tpp }} </td>
                                    <td>{{ $stat->ftp }} </td>
                                    <td>{{ $stat->fgp }} </td>
                                    <td>{{ $stat->assists }} </td>
                                    <td>{{ $stat->blocks }} </td>
                                    <td>{{ $stat->steals }} </td>
                                    <td>{{ $stat->turnovers }} </td>
                                    <td>{{ $stat->offReb }} </td>
                                    <td>{{ $stat->defReb }} </td>
                                    <td>{{ $stat->toReb }} </td>
                                    <td>{{ $stat->fgm }} </td>
                                    <td>{{ $stat->fga }} </td>
                                    <td>{{ $stat->tpm }} </td>
                                    <td>{{ $stat->tpa }} </td>
                                    <td>{{ $stat->ftm }} </td>
                                    <td>{{ $stat->fta }} </td>
                                    <td>{{ $stat->pFouls }} </td>
                                    <td>{{ $stat->points }} </td>
                                    <td>{{ $stat->gamesPlayes }} </td>
                                    <td>{{ $stat->gamesStarted }} </td>
                                    <td>{{ $stat->plusMinus }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- team stats --}}
    <div class="card mt-3">
        <div class="card">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Team stats: <b>
                    {{ $teamStats->first()->name }}
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
                                    <td> {{ $stat->name }} </td>
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

    {{-- teams --}}
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

    {{-- team players --}}
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
