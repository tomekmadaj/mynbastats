const dropdownTeams = document.getElementById('selectElementTeamId');
        dropdownTeams.length = 0;

        var defaultOption = document.createElement('option');
        defaultOption.value = 0;
        defaultOption.text = 'Choose Your Favourite Team';

        dropdownTeams.add(defaultOption);
        dropdownTeams.selectedIndex = 0;

        var teamsData = <?= json_encode($teams) ?>;
        let team;

        addTeams(teamsData);


        const dropdownPlayers = document.getElementById('selectElementPlayerId');
        dropdownPlayers.length = 0;

        var defaultOptionPlayers = document.createElement('option');
        defaultOptionPlayers.text = 'Choose Your Favourite Player';

        dropdownPlayers.add(defaultOptionPlayers);
        dropdownPlayers.selectedIndex = 0;

        var playersData = <?= json_encode($players) ?>;
        let player;
        var teamId = dropdownTeams.value;

        addPlayers(playersData);

        dropdownTeams.addEventListener('change', function() {
            console.log(teamId);
            teamId =  dropdownTeams.value;

            let i, L = dropdownPlayers.options.length -1;
            for (i = L; i >= 0; i--) {
                dropdownPlayers.remove(i);
            }
            dropdownPlayers.length = 0;

            dropdownPlayers.add(defaultOptionPlayers);
            dropdownPlayers.selectedIndex = 0

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
                if (teamsData[i].teamId == {{ $user->teamId }}) {
                    dropdownTeams.value = teamsData[i].teamId;
                }
            }
        }
