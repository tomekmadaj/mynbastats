<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\NbaNewsRepository;
use App\Repository\User\UserRepository;

class NewsController extends Controller
{
    private UserRepository $userRepository;

    public function __construct(NbaNewsRepository $nbaNewsRepository, UserRepository $userRepository)
    {
        $this->nbaNewsRepository = $nbaNewsRepository;
        $this->userRepository = $userRepository;
    }

    public function teamNews()
    {
        $user = Auth::user();
        $teamId = $user->teamId;

        $teamNewsData = $this->nbaNewsRepository->getTeamsNews($teamId);
        $userData = $this->userRepository->getUserTeamAndPlayer($user);

        return view('nbaStats.news', [
            'teamNews' => $teamNewsData,
            'user' => $userData
        ]);
    }


    public function teamHighlights()
    {
        $user = Auth::user();
        $userData = $this->userRepository->getUserTeamAndPlayer($user);

        $userTeamName = $userData->teams->fullName;
        $highlightsVideos = $this->nbaNewsRepository->getVideos($userTeamName);

        return view('nbaStats.highlights', [
            'videos' => $highlightsVideos,
            'user' => $userData
        ]);
    }
}
