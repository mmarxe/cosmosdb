<?php

namespace Macsakini\CosmosDB\Authorization;

class Auth
{
    private string $host;
    private string $private_key;
    private string $verb;
    private string $resourcetype;
    private string $resourcelink;
    private string $typeoftoken;
    private string $tokenversion = "1.0";

    public function __construct($host, $private_key, $verb, $resourcetype, $resourcelink, $typeoftoken)
    {
        $this->host = $host;
        $this->private_key = $private_key;
        $this->verb = $verb;
        $this->resourcetype = $resourcetype;
        $this->resourcelink = strval($resourcelink);
        $this->typeoftoken = $typeoftoken;
    }

    public function auth()
    {
        $signature = $this->signature();
        echo $this->resourcelink;
        return "type=$this->typeoftoken&ver=$this->tokenversion&sig=$signature";
    }

    public function signature()
    {
        $rfc7231_date = strtolower($this->UTCDateTime());
        $payload = "{$this->verb}\n{$this->resourcetype}\n{$this->resourcelink}\n{$rfc7231_date}\n\n";
        $key_decode = base64_decode($this->private_key);
        $hmac256 = hash_hmac("sha256", $payload, $key_decode);
        return base64_encode($hmac256);
    }

    public function UTCDateTime()
    {
        $date_utc = new \DateTime("now", new \DateTimeZone("UTC"));
        return $date_utc->format(\DateTime::RFC7231);
    }
}
