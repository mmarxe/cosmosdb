<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Authorization\Auth;
use Macsakini\CosmosDB\Query\HeaderBuilder;

class Collections implements CosmosInterface
{
    private string $host;
    private string $private_key;
    private string $dbid;
    private string $dbrtype = ResourceType::DBS->rtype();
    private string $rtype = ResourceType::COLLS->rtype();
    private string $token = Token::MASTER->token();
    public function __construct(string $host, string $private_key, string $dbid)
    {
        $this->host = $host;
        $this->private_key = $private_key;
        $this->dbid = $dbid;
    }
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

    public function get(string $containerid)
    {
        $verb = Verb::GET->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($containerid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();
    }
    public function create()
    {
        $verb = Verb::POST->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

    }
    public function list()
    {
        $verb = Verb::GET->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

    }
    public function delete(string $containerid)
    {
        $verb = Verb::DELETE->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($containerid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();
    }

    public function query()
    {

    }
}