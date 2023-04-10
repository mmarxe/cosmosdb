<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\Authorization\Auth;
use Macsakini\CosmosDB\Guzzle\GuzzleRequest;

abstract class BaseCosmos
{
    public string $host;
    public $headers;
    public string $verb;

    public function auth(
        $host,
        $private_key,
        $verb,
        $rtype,
        $resourcelink,
        $token
    ) {
        $auth = new Auth(
            $host,
            $private_key,
            $verb,
            $rtype,
            $resourcelink,
            $token
        );
        return $auth->auth();
    }

    abstract public function delete(string $dbid);
    abstract public function get(string $dbid);
    abstract public function list();
    abstract public function create();


    public function execute()
    {
        $execute = new GuzzleRequest(
            $this->host,
            $this->headers,
            $this->verb
        );
        $execute->call();
    }
}
