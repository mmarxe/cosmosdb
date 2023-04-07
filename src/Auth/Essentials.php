<?php

namespace Macsakini\CosmosDB;

enum Token
{
    case MASTER;
    case AAD;
    case RESOURCE;

    public function token(): string
    {
        return match ($this) {
            Token::MASTER => 'master',
            Token::AAD => 'aad',
            Token::RESOURCE => 'resource',
        };
    }
}


enum Verb
{
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;

    public function verb(): string
    {
        return match ($this) {
            Verb::GET => 'get',
            Verb::POST => 'post',
            Verb::PUT => 'put',
            Verb::PATCH => 'patch',
            Verb::DELETE => 'delete',
        };
    }
}