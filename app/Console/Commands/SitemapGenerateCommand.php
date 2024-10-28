<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        SitemapGenerator::create(config('app.url'))
            ->configureCrawler(function (Crawler $crawler) {
                $crawler->setMaximumDepth(3);
            })
            ->hasCrawled(function (Url $url) {
                $this->info("Crawled: {$url->url}");
                $url->setLastModificationDate(now());
                $url->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS);
                $url->setPriority(0.8);
                $url->addImage(url('/img/genealogy.svg'),
                    __('sitemap.caption'),
                    __('sitemap.geo_location'),
                    __('sitemap.title'),
                    __('sitemap.license'));

                return $url;
            })
            ->getSitemap()
            ->writeToFile(public_path('sitemap.xml'));
    }
}
