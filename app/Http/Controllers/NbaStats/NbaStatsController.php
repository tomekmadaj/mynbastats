<?php

declare(strict_types=1);

namespace App\Http\Controllers\NbaStats;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class NbaStatsController extends Controller
{
    public function dashboard(): View
    {
        return view('nbaStats.dashboard');
    }
}
