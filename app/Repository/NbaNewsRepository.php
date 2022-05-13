<?php

declare(strict_types=1);

namespace App\Repository;

use DOMComment;
use DOMDocument;

class NbaNewsRepository
{
    const ALL_NEWS = '';

    public function getNbaNews($teamNews = self::ALL_NEWS)
    {
        $newsUrl = 'https://fantasydata.com/nba-news';

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
}
