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
    public function getCollections()
    {

    }
    public function createCollections()
    {

    }
    public function listCollections()
    {

    }
    public function deleteCollections()
    {

    }
}