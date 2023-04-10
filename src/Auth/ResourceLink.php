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
        $this->dbid = $builder->dbid;
        $this->rtypecont = $builder->rtypecont;
        $this->contid = $builder->contid;
        $this->rtypedoc = $builder->rtypedoc;
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
