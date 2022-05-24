<?php

declare(strict_types=1);

namespace App\Repository;

use DOMDocument;

class NbaNewsRepository
{
    const ALL_NEWS = '';
    const All_VIDEOS = '';
    const YT_CHANNEL = 'UCMurFWpRhMHUAC-0nqrrfbg';
    // Nba YT chanel - 'Game Recap' - blocking
    // const YT_CHANNEL = 'UCLd4dSmXdrJykO_hgOzbfPw';
    const VIDOS_TO_SHOW = 4;


    public function getTeamsNews($teamId = self::ALL_NEWS)
    {
        $teamNewsData = config('teamnews');

        array_key_exists($teamId, $teamNewsData) ? $teamId = $teamNewsData[$teamId] : $teamId = self::ALL_NEWS;

        $newsUrl = "https://fantasydata.com/nba-news?team=$teamId";

        $dom = new DOMDocument();
        @$dom->loadHTMLfile($newsUrl);


        $xpath = new \DOMXPath($dom);
        $newsResults = $xpath->query("//*[@class='" . 'panel-heading' . "']");

        $newsDate = [];

        foreach ($newsResults as $heading) {
            $spans = $heading->getElementsByTagName('span');
            foreach ($spans as $span) {
                if (strlen($span->nodeValue) > 3)
                    $newsDate[] = $span->nodeValue;
            }
        }

        $newsTitle = [];
        $newsResults = $xpath->query("//*[@class='" . 'news-item-title' . "']");

        foreach ($newsResults as $titles) {
            $newsTitle[] = trim($titles->nodeValue, " \n\r\t\v\x00");
        }

        $newsContent = [];
        $newsResults = $xpath->query("//*[@class='" . 'news-item-content' . "']");

        foreach ($newsResults as $content) {
            $newsContent[] = trim($content->nodeValue, " \n\r\t\v\x00");
        }

        $newsSource = [];
        $newsResults = $xpath->query("//*[@class='" . 'meta' . "']");

        foreach ($newsResults as $sources) {
            $sources = $sources->getElementsByTagName('a');
            foreach ($sources as $source) {
                $newsSource[] = $source->getAttribute('href');
            }
        }

        $newsFeed = [];

        for ($i = 0; $i < count($newsDate); $i++) {
            array_push($newsFeed, [
                'date' => $newsDate[$i],
                'title' => $newsTitle[$i],
                'content' => $newsContent[$i],
                'source' => $newsSource[$i]
            ]);
        }

        return $newsFeed;
    }

    public function getVideos($teamId = self::All_VIDEOS)
    {
        $apiKey = env('YT_API_KEY');
        $chanelId = self::YT_CHANNEL;
        $maxResults = 50;

        if ($teamId != '') {
            $maxResults = 500;
        }

        $apiData = @file_get_contents("https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=$chanelId&maxResults=$maxResults&key=$apiKey");

        $videoList = json_decode($apiData);

        foreach ($videoList->items as $key => $video) {
            if (!$teamId == '') {
                if (!str_contains($video->snippet->title, $teamId)) {
                    unset($videoList->items[$key]);
                    continue;
                }
            }
            if (!str_contains($video->snippet->title, 'Full Game')) {
                unset($videoList->items[$key]);
            }
        }

        $videoList = array_slice($videoList->items, 0, self::VIDOS_TO_SHOW);

        return $videoList;
    }
}
