<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repository\NbaNewsRepositoryInterface;

class NewsController extends Controller
{
    private NbaNewsRepositoryInterface $nbaNewsRepository;

    public function __construct(NbaNewsRepositoryInterface $nbaNewsRepository)
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
