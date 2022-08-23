<?php

namespace App\Console\Commands;

use Exception;
use App\Models\Page;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pages:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch pages';

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
        foreach (config('pages.slugs') as $slug) {
            $page = $this->fetchPage(config('pages.uri'), $slug);

            if (!$page) {
                continue;
            }

            $page = json_decode($page);

            Page::firstOrCreate([
                'slug' => $slug,
            ], [
                'title' => $page->title,
                'content' => $page->content,
            ]);
        }

        $this->info('success');
    }

    /**
     * @param string $uri
     * @param string $slug
     * @return false|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchPage(string $uri, string $slug)
    {
        $client = new Client([
            'base_uri' => $uri,
            'timeout'  => 2.0,
        ]);

        try {
            $response = $client->request('GET', $slug);

            if ($response->getStatusCode() != 200) {
                return false;
            }

            $body = $response->getBody();

            return $body->getContents();
        } catch (Exception $exception) {
            return false;
        }
    }
}
