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

    public function UTCDateTime()
    {
        $date_utc = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date_utc->format(\DateTime::RFC7231);
    }

    public function call()
    {
        print_r($this->headers);
        $header_array = (array) $this->headers;
        $header_array['x-ms-version'] = '2018-12-31';
        $header_array['x-ms-date'] = strtolower($this->UTCDateTime());
        $client = new Client();
        $res = $client->request(
            $this->verb,
            $this->host,
            options: [
                'headers' => $header_array
            ]
        );
        return $res->getStatusCode();
    }
}
