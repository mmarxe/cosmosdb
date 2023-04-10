<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\CosmosInterface;
use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Query\HeaderBuilder;

class Document extends BaseCosmos
{
    public string $host;
    public string $private_key;

    public string $headers;
    public string $verb;

    public string $dbid;
    public string $containerid;
    public $rtype = ResourceType::DOCS->value;
    public $token = Token::MASTER->value;

    public function __construct(string $host, string $private_key, string $dbid, string $containerid)
    {
        $this->host = $host;
        $this->private_key = $private_key;
        $this->dbid = $dbid;
        $this->containerid = $containerid;
    }


    public function create()
    {
        $verb = Verb::POST->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
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
        $headers->setallowtentativewrites("true");
        $headers = $headers->build();
    }

    public function list()
    {
        $verb = Verb::GET->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
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

    public function get(string $docid)
    {
        $verb = Verb::GET->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
        $resourcelink->setResourceTypeDocument();
        $resourcelink->setDocument($docid);
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
        $headers->setallowtentativewrites("true");
        $headers = $headers->build();
    }

    public function delete(string $docid)
    {
        $verb = Verb::DELETE->value;

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
        $resourcelink->setResourceTypeDocument();
        $resourcelink->setDocument($docid);
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
