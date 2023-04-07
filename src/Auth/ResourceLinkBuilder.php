<?php

namespace Macsakini\CosmosDB\Authorization;

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
        $this->rtypedb = $rtypedb->rtype();
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
        $this->rtypecont = $rtypecont->rtype();
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
        $this->rtypedoc = $rtypedoc->rtype();
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