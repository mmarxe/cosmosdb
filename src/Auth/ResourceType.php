<?php

namespace Macsakini\CosmosDB\Authorization;

enum ResourceType: string
{
    case DBS = 'dbs';
    case COLLS = 'colls';
    case SPROCS = 'sprocs';
    case UDFS = 'udfs';
    case TRIGGERS = 'triggers';
    case USERS = 'users';
    case PERMISSIONS = 'permissions';
    case DOCS = 'docs';
}
