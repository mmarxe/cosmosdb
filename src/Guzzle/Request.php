<?php

namespace Macsakini\CosmosDB\Guzzle;

use Macsakini\CosmosDB\Query\Header;
use Macsakini\CosmosDB\Authorization\Verb;
use GuzzleHttp\Client;

class GuzzleRequest
{
    public string $host;
    public Header $headers;
    public string $verb;

    public function __construct(string $host, Header $headers, string $verb)
    {
        $this->host = $host;
        $this->headers = $headers;
        $this->verb = $verb;
    }

    public function call()
    {
        $client = new Client();
        $res = $client->request(
            $this->verb,
            $this->host,
            [
                'auth' => ['user', 'pass']
            ]
        );
        return $res->getStatusCode();
    }
}