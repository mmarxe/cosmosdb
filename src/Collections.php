<?php

namespace Macsakini\CosmosDB;

class Collections
{
    private string $host;
    private string $private_key;
    public function __construct(string $host, string $private_key)
    {
        $this->host = $host;
        $this->private_key = $private_key;
    }
    public function selectCollections()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";
    }
    public function createCollections()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";

    }
    public function listCollections()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";

    }
    public function deleteCollections()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";
    }
}