<?php
namespace Macsakini\CosmosDB;

interface CosmosInterface
{
    public function auth( 
        $host,
        $private_key,
        $verb,
        $rtype,
        $resourcelink,
        $token
    );
    public function delete(string $dbid);
    public function get(string $dbid);
    public function list();
    public function create();
}