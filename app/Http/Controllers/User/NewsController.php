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
        $teamNewsData = $this->nbaNewsRepository->getTeamsNews($user->teamId);
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
        $highlightsVideos = $this->nbaNewsRepository->getVideos($userData->teams->fullName);

        return view('nbaStats.highlights', [
            'videos' => $highlightsVideos,
            'user' => $userData
        ]);
    }
}
