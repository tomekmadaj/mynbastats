<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\NbaNewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NbaNewsController extends Controller
{
    private NbaNewsRepository $nbaNewsRepository;

    public function __construct(NbaNewsRepository $nbaNewsRepository)
    {
        $this->nbaNewsRepository = $nbaNewsRepository;
    }

    public function news()
    {
        $newsData = $this->nbaNewsRepository->getTeamsNews();

        return view('home.news', [
            'teamNews' => $newsData,
        ]);
    }

    public function highlights()
    {
        $highlightsVideos = $this->nbaNewsRepository->getVideos();

        return view('home.highlights', [
            'videos' => $highlightsVideos
        ]);
    }
}
