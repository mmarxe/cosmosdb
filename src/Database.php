<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Query\HeaderBuilder;


class Database extends BaseCosmos
{
    public string $host;
    public string $private_key;
    public $rtype = ResourceType::DBS->value;
    public $token = Token::MASTER->value;

    public function __construct(string $host, string $private_key)
    {
        $this->host = $host;
        $this->private_key = $private_key;
    }

    public function create()
    {
        $verb = Verb::POST->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink = $resourcelink->build();

        $auth_array = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $auth = $auth_array["signature"];
        $date = $auth_array["date"];

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
        $this->execute($this->host, $headers, $verb, $date);
    }

    public function list()
    {
        $verb = Verb::GET->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink = $resourcelink->build();

        $auth_array = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $auth = $auth_array["signature"];
        $date = $auth_array["date"];

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
        $this->execute($this->host, $headers, $verb, $date);
    }

    public function get(string $dbid)
    {
        $verb = Verb::GET->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($dbid);
        $resourcelink = $resourcelink->build();

        $auth_array = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $auth = $auth_array["signature"];
        $date = $auth_array["date"];

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
        $this->execute($this->host, $headers, $verb, $date);
    }

    public function delete(string $dbid)
    {
        $verb = Verb::DELETE->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($dbid);
        $resourcelink = $resourcelink->build();
        $auth_array = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $auth = $auth_array["signature"];
        $date = $auth_array["date"];

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
        $this->execute($this->host, $headers, $verb, $date);
    }
}
