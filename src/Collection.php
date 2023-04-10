<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Query\HeaderBuilder;

class Collection extends BaseCosmos
{
    public string $host;
    public string $private_key;
    
    public string $headers;
    public string $verb;

    public string $dbid;
    public $dbrtype = ResourceType::DBS->value;
    public $rtype = ResourceType::COLLS->value;
    public $token = Token::MASTER->value;

    public function __construct(string $host, string $private_key, string $dbid)
    {
        $this->host = $host;
        $this->private_key = $private_key;
        $this->dbid = $dbid;
    }

    public function get(string $containerid)
    {
        $verb = Verb::GET->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($containerid);
        $resourcelink = $resourcelink->build();

        $auth = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
    }

    public function create()
    {
        $verb = Verb::POST->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink = $resourcelink->build();

        $auth = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
    }

    public function list()
    {
        $verb = Verb::GET->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink = $resourcelink->build();

        $auth = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
    }

    public function delete(string $containerid)
    {
        $verb = Verb::DELETE->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($containerid);
        $resourcelink = $resourcelink->build();

        $auth = $this->auth(
            $this->host,
            $this->private_key,
            $verb,
            $this->rtype,
            $resourcelink,
            $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers = $headers->build();
    }
}
