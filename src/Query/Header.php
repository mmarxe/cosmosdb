<?php

namespace Macsakini\CosmosDB\Query;

class Header
{
    public string $authorization;
    public string $contenttype;
    public ?string $ifmatch = null;
    public ?string $ifnonematch = null;
    public ?string $ifmodifiedmatch = null;
    public ?string $useragent = null;
    public ?string $activityid = null;
    public ?string $consistencylevel = null;
    public ?string $continuation = null;
    public ?string $date = null;
    public ?string $maxitemcount = null;
    public ?string $partitionkey = null;
    public ?string $version = null;
    public ?string $im = null;
    public ?string $partitionkeyrangeid = null;
    public ?string $allowtentativewrites = null;

    public function __construct(HeaderBuilder $builder)
    {
        $this->authorization = $builder->authorization;
        $this->contenttype = "application/query+json";
        $this->ifmatch = $builder->ifmatch;
        $this->ifnonematch = $builder->ifnonematch;
        $this->ifmodifiedmatch = $builder->ifmodifiedmatch;
        $this->useragent = $builder->useragent;
        $this->activityid = $builder->activityid;
        $this->consistencylevel = $builder->consistencylevel;
        $this->continuation = $builder->continuation;
        $this->date = $builder->date;
        $this->maxitemcount = $builder->maxitemcount;
        $this->partitionkey = $builder->partitionkey;
        $this->version = $builder->version;
        $this->im = $builder->im;
        $this->partitionkeyrangeid = $builder->partitionkeyrangeid;
        $this->allowtentativewrites = $builder->allowtentativewrites;
    }
}
