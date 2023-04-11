<?php

namespace Macsakini\CosmosDB\Authorization;

use Exception;

class ResourceLink
{
    public ?string $rtypedb = null;
    public ?string $rtypecont = null;
    public ?string $rtypedoc = null;
    public ?string $dbid = null;
    public ?string $contid = null;
    public ?string $docid = null;

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
        if ($this->dbid !== null && $this->contid == null && $this->docid == null) {
            return (string) "{$this->rtypedb}/{$this->dbid}";
        } else if ($this->dbid !== null && $this->contid !== null && $this->docid == null) {
            return (string) "{$this->rtypedb}/{$this->dbid}/{$this->rtypecont}/{$this->contid}";
        } else if ($this->dbid !== null && $this->contid !== null && $this->docid !== null) {
            return (string) "{$this->rtypedb}/{$this->dbid}/{$this->rtypecont}/{$this->contid}/{$this->docid}";
        } else {
            return "";
        }
    }
}
