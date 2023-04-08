<?php

namespace Macsakini\CosmosDB\Query;

class QueryBuilder
{
    public function __construct()
    {

    }
    public function build()
    {
        $query = new Query($this);
        return $query;
    }
}