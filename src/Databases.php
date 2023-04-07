<?php

namespace Macsakini\CosmosDB;


class CosmosDB
{
    private string $host;
    private string $private_key;

    public function __construct(string $host, string $private_key)
    {
        $this->host = $host;
        $this->private_key = $private_key;
    }
    public function selectDB()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";
    }
    public function createDB()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";

    }
    public function listDB()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";

    }
    public function deleteDB()
    {
        $headers = new Query\HeaderBuilder(
            "sjsjs",
            "jsksk"
        );
        $headers->build();

        $body = "{id}";
    }
}