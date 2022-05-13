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
        $newsData = $this->nbaNewsRepository->getNbaNews();
        // dd($newsData);
        return view('home.news', [
            'news' => $newsData
        ]);
    }
}
