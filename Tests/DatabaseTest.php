<?php

namespace Macsakini\CosmosDB\Test;

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
}