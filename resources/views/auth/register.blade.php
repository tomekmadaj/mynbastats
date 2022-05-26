@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="favTeam"
                                class="col-md-4 col-form-label text-md-right">{{ __('Favourite Team') }}</label>
                                <div class="col-md-6">
                                    <select class="custom-select mr-sm-2 form-control @error('team') is-invalid @enderror" name="team" required autocomplete="team">
                                        <option value = 0> Choose Your Favourite Team </option>
                                        @foreach ($teams as $team)
                                            <option value='{{ $team->teamId }}'
                                                {{ $team->teamId ==  old('team') ? 'selected' : '' }}>
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
                            <div class="form-group row">
                                <label for="favPlayer"
                                class="col-md-4 col-form-label text-md-right">{{ __('Favourite Player') }}</label>
                                <div class="col-md-6">
                                    <select id="selectPlayerId" name="player" class="custom-select mr-sm-2 form-control @error('player') is-invalid @enderror" required autocomplete="player">
                                    </select>
                                    @error('player')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <label
                                class="col-md-4 col-form-label text-md-right"> </label>
                                <div class="col-md-6">
                                    <select id="selectPlayerTeamId" class="custom-select mr-sm-2">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

        // addPlayers(playersData);

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
                }
            }
        }

        function addTeams(teamsData) {
            for (let i = 0; i < teamsData.length; i++) {
            team = document.createElement('option');
            team.text = teamsData[i].fullName;
            team.value = teamsData[i].teamId;
            dropdownTeams.add(team);
            }
        }
    </script>
@endsection
