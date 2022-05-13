<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\NbaNewsRepository;
use Illuminate\Http\Request;

class NbaNewsController extends Controller
{
    private NbaNewsRepository $nbaNewsRepository;

    public function __construct(NbaNewsRepository $nbaNewsRepository)
    {
        $this->nbaNewsRepository = $nbaNewsRepository;
    }

    public function __invoke()
    {
        $newsData = $this->nbaNewsRepository->getTeamsNews();

        return view('home.news', [
            'teamNews' => $newsData
        ]);
    }
}
