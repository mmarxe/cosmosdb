<?php

namespace Macsakini\CosmosDB\Query;

class Header
{
    public string $authorization;
    public string $contenttype;
    public string $ifmatch;
    public string $ifnonematch;
    public string $ifmodifiedmatch;
    public string $useragent;
    public string $activityid;
    public string $consistencylevel;
    public string $continuation;
    public string $date;
    public string $maxitemcount;
    public string $partitionkey;
    public string $version;
    public string $im;
    public string $partitionkeyrangeid;
    public string $allowtentativewrites;

    public function __construct(HeaderBuilder $builder)
    {
        $this->authorization = $builder->authorization;
        $this->contenttype = $builder->contenttype;
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