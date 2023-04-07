<?php

namespace Macsakini\CosmosDB;


class CosmosDB{
    private string $host;
    private string $private_key;


    public function __construct(string $host, string $private_key)
    {
        $this->host = $host;
        $this->private_key = $private_key;
    }
    public function selectDB(){

    }
    public function createDB(){

    }
    public function listDB(){

    }
    public function deleteDB(){

    }
}