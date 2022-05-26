@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('me.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="rounded mx-auto d-block user-avatar">
                    {{-- <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded mx-auto d-block user-avatar"> --}}
                @else
                    <img src="/images/avatar.png" class="rounded mx-auto d-block">
                @endif

                <div class="form-group">
                    <div class="form-group">
                        <label for="avatar">Select avatar ...</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                        @error('avatar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name', $user->name) }}" />
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="div row mb-4">
                    <div class="div col-xl-6 col-sm-12">
                        <label for="favouriteTeam">Favourite Team</label>
                        <div>
                            <select name="team" class="custom-select mr-sm-2 form-control @error('team') is-invalid @enderror" required autocomplete="team" name="team">
                                @foreach ($teams as $team)
                                    <option value='{{ $team->teamId }}'
                                        {{ $user->teams->teamId == $team->teamId ? 'selected' : '' }}>
                                        {{ $team->fullName }} </option>
                                @endforeach
                            </select>
                            @error('team')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="div col-xl-6 col-sm-12 mt-xl-0 mt-3">
                        <label for="favouriteTeam">Favourite Player</label>
                        <div class="div row">
                            <div class="col-xl-6 col-md-6 col-xs-12">
                                <div>
                                    <select id="selectPlayerId" name="player" class="custom-select mr-sm-2 form-control @error('player') is-invalid @enderror" required autocomplete="player">
                                    </select>
                                    @error('player')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-xs-12">
                                <div>
                                    <select id="selectPlayerTeamId" class="custom-select mr-sm-2">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('me.profile') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        const dropdownTeams = document.getElementById('selectPlayerTeamId');
        dropdownTeams.length = 0;

        var defaultOptionTeams = document.createElement('option');
        defaultOptionTeams.value = 0;
        defaultOptionTeams.text = 'Choose Your Favourite Player Team';

        dropdownTeams.add(defaultOptionTeams);
        dropdownTeams.selectedIndex = 0;

        var teamsData = <?= json_encode($teams) ?>;
        let team;

        addTeams(teamsData);


        const dropdownPlayers = document.getElementById('selectPlayerId');
        dropdownPlayers.length = 0;

        var defaultOptionPlayers = document.createElement('option');
        defaultOptionPlayers.value = 0;
        defaultOptionPlayers.text = 'Choose Your Favourite Player';

        dropdownPlayers.add(defaultOptionPlayers);
        dropdownPlayers.selectedIndex = 0;

        var playersData = <?= json_encode($players) ?>;
        let player;
        var teamId = dropdownTeams.value;

        addPlayers(playersData);

        dropdownTeams.addEventListener('change', function() {


            let i, L = dropdownPlayers.options.length -1;
            for (i = L; i >= 0; i--) {
                dropdownPlayers.remove(i);
            }
            dropdownPlayers.length = 0;

            dropdownPlayers.add(defaultOptionPlayers);
            dropdownPlayers.selectedIndex = 0

            teamId =  dropdownTeams.value;
            addPlayers(playersData);
        });

        function addPlayers(playersData) {
            for (let i = 0; i < playersData.length; i++) {
            if (playersData[i].teamId == teamId) {
                player = document.createElement('option');
                player.text = playersData[i].firstName + ' ' + playersData[i].lastName;
                player.value = playersData[i].personId;
                dropdownPlayers.add(player);
                    if (playersData[i].personId == {{ $user->personId }}) {
                       dropdownPlayers.value = playersData[i].personId;
                    }
                }
            }
        }

        function addTeams(teamsData) {
            for (let i = 0; i < teamsData.length; i++) {
            team = document.createElement('option');
            team.text = teamsData[i].fullName;
            team.value = teamsData[i].teamId;
            dropdownTeams.add(team);
                if (teamsData[i].teamId == {{ $user->players->teamId }}) {
                    dropdownTeams.value = teamsData[i].teamId;
                }
            }
        }
    </script>
@endsection
