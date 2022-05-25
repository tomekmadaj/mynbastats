<?php

declare(strict_types=1);

namespace App\Repository;

interface NbaNewsRepositoryInterface
{
    const ALL_NEWS = '';
    const All_VIDEOS = '';
    const YT_CHANNEL = 'UCMurFWpRhMHUAC-0nqrrfbg';
    // Nba YT chanel - 'Game Recap' - blocking
    // const YT_CHANNEL = 'UCLd4dSmXdrJykO_hgOzbfPw';
    const VIDOS_TO_SHOW = 4;

    public function getTeamsNews($teamId = self::ALL_NEWS);

    public function getVideos($teamId = self::All_VIDEOS);
}
