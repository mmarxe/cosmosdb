<?php

namespace Macsakini\CosmosDB\Guzzle;

use Macsakini\CosmosDB\Query\Header;
use GuzzleHttp\Client;

class GuzzleRequest
{
    public string $host;
    public Header $headers;
    public string $verb;
    public string $date;

    public function __construct(string $host, Header $headers, string $verb, string $date)
    {
        $this->host = $host;
        $this->headers = $headers;
        $this->verb = $verb;
        $this->date = $date;
    }

    public function UTCDateTime()
    {
        $date_utc = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date_utc->format(\DateTime::RFC7231);
    }

    public function call()
    {
        $header_array = [];
        $header_array["authorization"] = $this->headers->authorization;
        $header_array["Accept"] = $this->headers->contenttype;
        $header_array['x-ms-version'] = '2018-12-31';
        $header_array['x-ms-date'] = $this->date;
        $client = new Client();
        $res = $client->request(
            $this->verb,
            $this->host,
            options: [
                'headers' => $header_array
            ]
        );
        return $res;
    }
}
