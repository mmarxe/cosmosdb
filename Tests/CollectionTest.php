<?php

namespace Macsakini\CosmosDB\Test;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Collection;
use PHPUnit\Framework\TestCase;


final class CollectionTest extends TestCase
{
    public function testClassConstructor()
    {
        $collection = new Collection(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variants'
        );

        $this->assertSame('https://buysadb.documents.azure.com:443/', $collection->host);
        $this->assertSame('lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==', $collection->private_key);
        $this->assertSame('Variants', $collection->dbid);
    }

    public function testAuthFunction()
    {
        $collection = new Collection(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variants'
        );

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase("Variants");
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer("VariantsContainer");
        $resourcelink = $resourcelink->build();

        $authsignature = $collection->auth(
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
        $collection = new Collection(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variants'
        );
        $response = $collection->delete("VariantContainer");
        $this->assertNotEmpty($response);
    }

    public function testGetFunction()
    {
        $collection = new Collection(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variants'
        );
        $response = $collection->get("VariantContainer");
        $this->assertNotEmpty($response);
    }

    public function testListFunction()
    {
        $collection = new Collection(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variants'
        );
        $response = $collection->list();
        $this->assertNotEmpty($response);
    }

    public function testCreateFunction()
    {
        $collection = new Collection(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variants'
        );
        $response = $collection->create();
        $this->assertNotEmpty($response);
    }
}
