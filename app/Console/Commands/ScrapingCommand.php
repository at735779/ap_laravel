<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Scraping;
use Goutte\Client;
use DateTime;

class ScrapingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scraping the latest information on the administrative site';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client();

        // 初期化
        Scraping::truncate();

        // 熊本市HPの新着情報一覧を参照
        $crawler = $client->request('GET', 'https://www.city.kumamoto.jp/new_list/pub/Default.aspx?c_id=1');

        // 更新日の取得
        $date_string =  $crawler->filter('div.bunrui')->eq(0)->text();
        $date = DateTime::createFromFormat('Y年m月d日', $date_string);
        $date->format('Y-m-d');

        // 1日分の更新項目のタイトルテキストを取得
        $titles = $crawler->filter('ul.list')->eq(0)->filter('li')->each(function($node){
            $title = $node->filter('a')->text();
            return $title;
        });

        // 1日分の更新項目のURLを取得
        $urls = $crawler->filter('ul.list')->eq(0)->filter('li')->each(function($node){
            $url = $node->filter('a')->attr('href');
            return $url;
        });

        // 取得したデータをデータベースに保存
        for($i=0; $i<count($titles); $i++) {
            $scraping = new Scraping;
            $scraping->date = $date;
            $scraping->title = $titles[$i];
            $scraping->url = $urls[$i];
            $scraping->save();
        }

        return 0;
    }
}
