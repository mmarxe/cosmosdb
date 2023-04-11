<?php

namespace Macsakini\CosmosDB\Test;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Database;
use PHPUnit\Framework\TestCase;


final class DatabaseTest extends TestCase
{
    public function testClassConstructor()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg=='
        );

        $this->assertSame('https://buysadb.documents.azure.com:443/', $database->host);
        $this->assertSame('YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg==', $database->private_key);
    }

    public function testAuthFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg=='
        );

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase("Variants");
        $resourcelink = $resourcelink->build();


        $authsignature = $database->auth(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg==',
            Verb::GET->value,
            ResourceType::DBS->value,
            $resourcelink,
            Token::MASTER->value
        );

        $this->assertNotEmpty($authsignature);
    }

    public function testDeleteFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg=='
        );
        $response = $database->delete("VariantsContainer");
        $this->assertNotEmpty($response);
    }

    public function testGetFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg=='
        );
        $response = $database->get("VariantsContainer");
        $this->assertNotEmpty($response);
    }

    public function testListFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg=='
        );
        $response = $database->list();
        $this->assertNotEmpty($response);
    }

    public function testCreateFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'YcTdWtQEgIpJ4PhaM5OfK6F4lxeJMkKx70DZQ1kZfUxkJNUA00eXWrV78GcxMQfk1jRR4EyBPut7ACDbICyTbg=='
        );
        $response = $database->create();
        $this->assertNotEmpty($response);
    }
}
