<?php namespace Slacky\Libs;

use GuzzleHttp\Client;

class Dvacher {

    /**
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_url' => 'https://2ch.hk']);
    }

    public function getPosts($thread_id)
    {
        $result = json_decode($this->client->get("/wrk/res/{$thread_id}.json")->getBody());

        if ($result) {
            return $result->threads[0]->posts;
        }

        return [];
    }

}