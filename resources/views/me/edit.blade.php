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
                <!-- X-XSRF-TOKEN -->
                @if ($user->avatar)
                    <img src="{{ Storage::url($user->avatar) }}" class="rounded mx-auto d-block user-avatar">
                    <!-- <img src="{{ asset('storage/' . $user->avatar) }}" class="rounded mx-auto d-block user-avatar"> -->
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
                {{-- <div class="form-group">
                    <label for="phone">Telefon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                        value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div> --}}


                <div class="div row mb-4">
                    <div class="div col-6">
                        <label for="favouriteTeam">Favourite Team</label>
                        <div>
                            <select class="custom-select mr-sm-2" name="team">
                                @foreach ($teams as $team)
                                    <option value='{{ $team->teamId }}'
                                        {{ $user->teams->teamId == $team->teamId ? 'selected' : '' }}>
                                        {{ $team->fullName }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="div col-6">
                        <label for="favouriteTeam">Favourite Player</label>
                        <div class="div row">
                            <div class="col-6">
                                <div>
                                    <select class="custom-select mr-sm-2" name="player">
                                        @foreach ($players as $player)
                                            <option class="some" value='{{ $player->personId }}'
                                                {{ $user->players->personId == $player->personId ? 'selected' : '' }}>
                                                {{ $player->lastName }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <select id="selectElementPlayerId" class="custom-select mr-sm-2">

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div>
                                    <select id="selectCos" class="custom-select mr-sm-2">

                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div>
                                    <select id="selectElementTeamId" class="custom-select mr-sm-2" onchange="val()">

                                    </select>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Zapisz dane</button>
                <a href="{{ route('me.profile') }}" class="btn btn-secondary">Anuluj</a>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        let dropdownTeams = document.getElementById('selectElementTeamId');
        dropdownTeams.length = 0;

        let defaultOption = document.createElement('option');
        defaultOption.value = 99;
        defaultOption.text = 'Choose Your Favourite Team';

        dropdownTeams.add(defaultOption);
        dropdownTeams.selectedIndex = 0;

        var teamsData = <?= json_encode($teams) ?>;
        let option;

        for (let i = 0; i < teamsData.length; i++) {
            option = document.createElement('option');
            option.text = teamsData[i].fullName
            option.value = teamsData[i].teamId
            dropdownTeams.add(option);
            if (teamsData[i].teamId == {{ $user->teamId }}) {
                dropdownTeams.value = teamsData[i].teamId;
            }
        }

        let dropdownPlayers = document.getElementById('selectElementPlayerId');
        dropdownPlayers.length = 0;

        let defaultOptionPlayers = document.createElement('option');
        defaultOptionPlayers.text = 'Choose Your Favourite Player';

        dropdownPlayers.add(defaultOptionPlayers);
        dropdownPlayers.selectedIndex = 0;

        var playersData = <?= json_encode($players) ?>;
        let player;
        let teamId = dropdownTeams.value;

        for (let i = 0; i < playersData.length; i++) {
            if (playersData[i].teamId == teamId) {
                player = document.createElement('option');
                player.text = playersData[i].lastName;
                player.value = playersData[i].personId;
                dropdownPlayers.add(player);
                if (playersData[i].personId == {{ $user->personId }}) {
                    dropdownPlayers.value = playersData[i].personId;
                }
            }
        }

        dropdown.addEventListener('change', function() {
            var value = dropdown.value;
            // alert(value);
        });
    </script>
@endsection
