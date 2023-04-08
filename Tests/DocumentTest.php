<?php

namespace Macsakini\CosmosDB\Tests;

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
}