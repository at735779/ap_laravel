<?php

namespace App\Http\Controllers;

use Goutte\Client;

class ScrapingController extends Controller
{
    public function scraping()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.amazon.co.jp/gp/bestsellers/digital-text/2430812051/ref=pd_zg_hrsr_digital-text');
        $titles = $crawler->filter('li.zg-item-immersion')->each(function ($li) {
            $title = $li->filter('div.p13n-sc-truncate-desktop-type2')->text();
            return $title;
        });
        return view('scraping', compact('titles'));
    }
}
