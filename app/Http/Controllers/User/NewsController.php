<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\NbaNewsRepositoryInterface;
use App\Repository\UserRepositoryInterface;

class NewsController extends Controller
{
    private NbaNewsRepositoryInterface $nbaNewsRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(NbaNewsRepositoryInterface $nbaNewsRepository, UserRepositoryInterface $userRepository)
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
