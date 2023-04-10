<?php

namespace Macsakini\CosmosDB;

use Macsakini\CosmosDB\Authorization\Auth;

abstract class BaseCosmos
{
    public function auth(
        $host,
        $private_key,
        $verb,
        $rtype,
        $resourcelink,
        $token
    ) {
        $auth = new Auth(
            $host,
            $private_key,
            $verb,
            $rtype,
            $resourcelink,
            $token
        );
        return $auth->auth();
    }

    abstract public function delete(string $dbid);
    abstract public function get(string $dbid);
    abstract public function list();
    abstract public function create();
}
