<?php

namespace Macsakini\CosmosDB\Tests;

use Macsakini\CosmosDB\Authorization\ResourceLinkBuilder;
use Macsakini\CosmosDB\Authorization\ResourceType;
use Macsakini\CosmosDB\Authorization\Token;
use Macsakini\CosmosDB\Authorization\Verb;
use Macsakini\CosmosDB\Document;
use PHPUnit\Framework\TestCase;


final class DocumentTest extends TestCase
{
    public function testClassConstructor()
    {
        $document = new Document(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variant',
            'VariantsContainer'
        );

        $this->assertSame('https://buysadb.documents.azure.com:443/', $document->host);
        $this->assertSame('lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==', $document->private_key);
        $this->assertSame('Variant', $document->dbid);
        $this->assertSame('VariantsContainer', $document->containerid);
    }

    public function testAuthFunction()
    {
        $document = new Document(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variant',
            'VariantsContainer'
        );

        $resourcelink = new ResourceLinkBuilder();
        $resourcelink->setResourceTypeDB();
        $resourcelink->setDatabase("Variant");
        $resourcelink->setResourceTypeContainer();
        $resourcelink->setContainer("VariantContainer");
        $resourcelink->setResourceTypeDocument();
        $resourcelink->setDocument("82892920101");
        $resourcelink = $resourcelink->build();

        $authsignature = $document->auth(
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
        $document = new Document(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variant',
            'VariantsContainer'
        );
        $document->delete("VariantsContainer");
    }

    public function testGetFunction()
    {
        $document = new Document(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variant',
            'VariantsContainer'
        );
        $document->get("VariantsContainer");
    }

    public function testListFunction()
    {
        $document = new Document(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variant',
            'VariantsContainer'
        );
        $document->list("VariantsContainer");
    }

    public function testCreateFunction()
    {
        $document = new Document(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            'Variant',
            'VariantsContainer'
        );
        $document->delete("VariantContainer");
    }
}
