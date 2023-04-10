<?php


class DatabaseCreator extends BaseCreator
{
    public function factoryMethod(): CosmosObject
    {
        return new DatabaseObject();
    }
}
