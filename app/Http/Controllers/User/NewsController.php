<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repository\NbaNewsRepository;
use App\Repository\NbaRepository;

class NewsController extends Controller
{
    private NbaNewsRepository $nbaNewsRepository;
    private NbaRepository $nbaRepository;

    public function __construct(NbaNewsRepository $nbaNewsRepository, NbaRepository $nbaRepository)
    {
        $this->nbaNewsRepository = $nbaNewsRepository;
        $this->nbaRepository = $nbaRepository;
    }

    public function teamNews()
    {
        $user = Auth::user();
        $teamId = $user->teamId;

        $teamNewsData = $this->nbaNewsRepository->getTeamsNews($teamId);
        $userTeam = $this->nbaRepository->getUserTeam($teamId);

        return view('nbaStats.news', [
            'teamNews' => $teamNewsData,
            'team' => $userTeam
        ]);
    }
}
