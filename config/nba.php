<?php

return [
    'api' => [
        'teams' => 'https://data.nba.net/prod/v2/2021/teams.json',
        'players' => 'https://data.nba.net/10s/prod/v1/2021/players.json',
        'standings' => 'https://data.nba.net/prod/v1/current/standings_conference.json',
        'todayData' => 'https://data.nba.net/10s/prod/v1/today.json',
        'playerProfile' => 'https://data.nba.net/prod/v1/2021/players/{{personId}}_profile.json',
        'teamStatsRanking' => 'https://data.nba.net/prod/v1/2021/team_stats_rankings.json',
        'teamLeaders' => 'https://data.nba.net/prod/v1/2021/teams/{{teamId}}/leaders.json',
        'schedule' => 'https://data.nba.net/prod/v1/2021/schedule.json',
        'gameBoxscore' => 'https://data.nba.net/prod/v1/{{gameDate}}/{{gameId}}_boxscore.json',
    ]
];
