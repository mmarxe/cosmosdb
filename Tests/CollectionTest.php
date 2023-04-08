<?php

namespace Macsakini\CosmosDB;

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
}