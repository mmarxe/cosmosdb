<?php

namespace Macsakini\CosmosDB\Authorization;

enum Token: string
{
    Case MASTER = 'master';
    Case AAD = 'aad';
    Case RESOURCE = 'resource';
}


enum Verb : string
{
    Case GET = 'get';
    Case POST = 'post';
    Case PUT = 'put';
    Case PATCH = 'patch';
    Case DELETE = 'delete';

   
}