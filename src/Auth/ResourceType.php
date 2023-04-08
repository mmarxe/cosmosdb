<?php

namespace Macsakini\CosmosDB\Authorization;

enum ResourceType : string
{
    Case DBS = 'dbs';
    Case COLLS = 'colls';
    Case SPROCS = 'sprocs';
    Case UDFS = 'udfs';
    Case TRIGGERS = 'triggers';
    Case USERS = 'users';
    Case PERMISSIONS = 'permissions';
    Case DOCS = 'docs';
}