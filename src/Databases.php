<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Authorization\Auth;
use Macsakini\CosmosDB\Query\HeaderBuilder;


class CosmosDB implements CosmosInterface
{
    private string $host;
    private string $private_key;
    private string $rtype = ResourceType::DBS->rtype();
    private string $token = Token::MASTER->token();

    public function __construct(string $host, string $private_key)
    {
        $this->host = $host;
        $this->private_key = $private_key;
    }
    public function auth($host, $private_key, $verb, $rtype, $resourcelink, $token)
    {
        return new Auth(
            $host,
            $private_key,
            $verb,
            $rtype,
            $resourcelink,
            $token
        );
    }
    public function create()
    {
        $verb = Verb::POST;
        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->build();

        $auth = $this->auth($this->host, $this->private_key, $verb, $this->rtype, $resourcelink, $this->token);

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

    }
    public function list()
    {
        $verb = Verb::GET;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->build();

        $auth = $this->auth($this->host, $this->private_key, $verb, $this->rtype, $resourcelink, $this->token);

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();
    }

    public function get(string $dbid)
    {
        $verb = Verb::GET->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->build();

        $auth = $this->auth($this->host, $this->private_key, $verb, $this->rtype, $resourcelink, $this->token);

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

    }
    public function delete(string $dbid)
    {
        $verb = Verb::DELETE;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->build();

        $auth = $this->auth($this->host, $this->private_key, $verb, $this->rtype, $resourcelink, $this->token);

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();
    }

    public function query()
    {

    }
}