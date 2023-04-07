<?php

namespace Macsakini\CosmosDB\Authorization;

enum ResourceType
{
    case DBS;
    case COLLS;
    case SPROCS;
    case UDFS;
    case TRIGGERS;
    case USERS;
    case PERMISSIONS;
    case DOCS;

    public function rtype(): string
    {
        return match ($this) {
            ResourceType::DBS => 'dbs',
            ResourceType::COLLS => 'colls',
            ResourceType::SPROCS => 'sprocs',
            ResourceType::UDFS => 'udfs',
            ResourceType::TRIGGERS => 'triggers',
            ResourceType::USERS => 'users',
            ResourceType::PERMISSIONS => 'permissions',
            ResourceType::DOCS => 'docs',
        };
    }
}