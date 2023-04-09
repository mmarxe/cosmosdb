<?php

namespace Macsakini\CosmosDB\Query;

class HeaderBuilder
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

    public function __construct($authorization, $contenttype)
    {
        $this->authorization = $authorization;
        $this->contenttype = $contenttype;
    }

    public function setifmatch(string $arg)
    {
        $this->ifmatch = $arg;
        return $this;
    }
    public function setifnonematch(string $arg)
    {
        $this->ifnonematch = $arg;
        return $this;
    }
    public function setifmodifiedmatch(string $arg)
    {
        $this->ifmodifiedmatch = $arg;
        return $this;
    }
    public function setuseragent(string $arg)
    {
        $this->useragent = $arg;
        return $this;
    }
    public function setactivityid(string $arg)
    {
        $this->activityid = $arg;
        return $this;
    }
    public function setconsistencylevel(string $arg)
    {
        $this->consistencylevel = $arg;
        return $this;
    }
    public function setcontinuation(string $arg)
    {
        $this->continuation = $arg;
        return $this;
    }
    public function setdate(string $arg)
    {
        $this->date = $arg;
        return $this;
    }
    public function setmaxitemcount(string $arg)
    {
        $this->maxitemcount = $arg;
        return $this;
    }
    public function setpartitionkey(string $arg)
    {
        $this->partitionkey = $arg;
        return $this;
    }
    public function setversion(string $arg)
    {
        $this->version = $arg;
        return $this;
    }
    public function setim(string $arg)
    {
        $this->im = $arg;
        return $this;
    }
    public function setpartitionkeyrangeid(string $arg)
    {
        $this->partitionkeyrangeid = $arg;
        return $this;
    }
    public function setallowtentativewrites(string $arg)
    {
        $this->allowtentativewrites = $arg;
        return $this;
    }

    public function build()
    {
        $header = new Header($this);
        return $header;
    }
}
