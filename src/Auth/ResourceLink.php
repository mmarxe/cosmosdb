<?php

namespace Macsakini\CosmosDB\Authorization;

use Exception;

class ResourceLink
{
    public ?string $rtypedb;
    public ?string $rtypecont;
    public ?string $rtypedoc;
    public ?string $dbid;
    public ?string $contid;
    public ?string $docid;

    public function __construct(ResourceLinkBuilder $builder)
    {
        $this->rtypedb = $builder->rtypedb;
        $this->rtypecont = $builder->rtypecont;
        $this->rtypedoc = $builder->rtypedoc;
        $this->dbid = $builder->dbid;
        $this->contid = $builder->contid;
        $this->docid = $builder->docid;
    }

    public function __toString()
    {
        try {
            return (string) "{$this->rtypedb}/{$this->dbid}/{$this->rtypecont}/{$this->contid}/{$this->docid}";
        } catch (Exception $exception) {
            return '';
        }
    }
}
