<?php

namespace Macsakini\CosmosDB\Authorization;

use Exception;

class ResourceLinkBuilder
{
    public string $rtypedb;
    public string $rtypecont;
    public string $rtypedoc;
    public string $dbid;
    public string $contid;
    public string $docid;

    public function setResourceTypeDB()
    {
        $rtypedb = ResourceType::DBS;
        $this->rtypedb = $rtypedb->value;
        return $this;
    }

    public function setDatabase(string $dbid)
    {
        $this->dbid = $dbid;
        return $this;
    }

    public function setResourceTypeContainer()
    {
        $rtypecont = ResourceType::COLLS;
        $this->rtypecont = $rtypecont->value;
        return $this;
    }

    public function setContainer(string $contid)
    {
        $this->contid = $contid;
        return $this;
    }

    public function setResourceTypeDocument()
    {
        $rtypedoc = ResourceType::DOCS;
        $this->rtypedoc = $rtypedoc->value;
        return $this;
    }

    public function setDocument(string $docid)
    {
        $this->docid = $docid;
        return $this;
    }

    public function build()
    {
        $resource = new ResourceLink($this);
        return $resource;
    }
}
