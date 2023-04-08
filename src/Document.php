<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\CosmosInterface;
use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Authorization\Auth;
use Macsakini\CosmosDB\Guzzle\GuzzleRequest;
use Macsakini\CosmosDB\Query\HeaderBuilder;

class Document implements CosmosInterface
{
    private string $host;
    private string $private_key;
    private string $dbid;
    private string $containerid;
    private string $rtype = ResourceType::DOCS->rtype();
    private string $token = Token::MASTER->token();

    public function __construct(string $host, string $private_key, string $dbid, string $containerid)
    {
        $this->host = $host;
        $this->private_key = $private_key;
        $this->dbid = $dbid;
        $this->containerid = $containerid;
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
    public function create()
    {
        $verb = Verb::POST->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

        $execute = new GuzzleRequest(
            $this->host,
            $headers->build(),
            $verb
        );
        $execute->call();

    }
    public function list()
    {
        $verb = Verb::GET->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

        $execute = new GuzzleRequest(
            $this->host,
            $headers->build(),
            $verb
        );
        $execute->call();
    }

    public function get(string $docid)
    {
        $verb = Verb::GET->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
        $resourcelink->setResourceTypeDocument();
        $resourcelink->setDocument($docid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

        $execute = new GuzzleRequest(
            $this->host,
            $headers->build(),
            $verb
        );
        $execute->call();

    }
    public function delete(string $docid)
    {
        $verb = Verb::DELETE->verb();

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase($this->dbid);
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer($this->containerid);
        $resourcelink->setResourceTypeDocument();
        $resourcelink->setDocument($docid);
        $resourcelink->build();

        $auth = $this->auth(
            $this->host, $this->private_key,
            $verb, $this->rtype,
            $resourcelink, $this->token
        );

        $headers = new HeaderBuilder($auth, "JSON");
        $headers->setallowtentativewrites(true);
        $headers->build();

        $execute = new GuzzleRequest(
            $this->host,
            $headers->build(),
            $verb
        );
        $execute->call();
    }
}