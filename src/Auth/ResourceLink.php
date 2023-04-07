<?php

namespace Macsakini\CosmosDB\Authorization;

class ResourceLink
{
    public string $rtypedb;
    public string $rtypecont;
    public string $rtypedoc;
    public string $dbid;
    public string $contid;
    public string $docid;

    public function __construct(ResourceLinkBuilder $builder)
    {
        $this->rtypedb = $builder->rtypedb;
        $this->rtypecont = $builder->rtypedb;
        $this->rtypedoc = $builder->rtypedb;
        $this->dbid = $builder->rtypedb;
        $this->contid = $builder->rtypedb;
        $this->docid = $builder->rtypedb;
    }
}