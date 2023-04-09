<?php

namespace Macsakini\CosmosDB\Authorization;

enum Token: string
{
    case MASTER = 'master';
    case AAD = 'aad';
    case RESOURCE = 'resource';
}


enum Verb: string
{
    case GET = 'get';
    case POST = 'post';
    case PUT = 'put';
    case PATCH = 'patch';
    case DELETE = 'delete';
}
