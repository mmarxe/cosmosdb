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
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );

        $this->assertSame('https://buysadb.documents.azure.com:443/', $database->host);
        $this->assertSame('lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==', $database->private_key);
    }

    public function testAuthFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase("Variant");
        $resourcelink = $resourcelink->build();


        $authsignature = $database->auth(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
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
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );
        $database->delete("VariantsContainer");
    }

    public function testGetFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );
        $database->get("VariantsContainer");
    }

    public function testListFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );
        $database->list("VariantsContainer");
    }

    public function testCreateFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );
        $database->delete("VariantContainer");
    }
}
