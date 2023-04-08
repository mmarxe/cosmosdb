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

    public function testAuthFunction()
    {
        $database = new Database(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A=='
        );

        $database->auth(
            'https://buysadb.documents.azure.com:443/',
            'lwoRtHgTHwy6iH18roGLNQxwm3iZai0Nl9NPBNudNKpjIUZosmwDMduGMIxVQyWbUMx4OopZiKUmACDbuXO21A==',
            "get",
            "2",
            "3",
            "4"
        );
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
