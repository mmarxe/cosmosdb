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
    private readonly string $tokenversion;
    public string $rfc7231_date;

    public function __construct($host, $private_key, $verb, $resourcetype, $resourcelink, $typeoftoken)
    {
        $this->host = $host;
        $this->private_key = $private_key;
        $this->verb = $verb;
        $this->resourcetype = $resourcetype;
        $this->resourcelink = strval($resourcelink);
        $this->typeoftoken = $typeoftoken;
        $this->tokenversion = "1.0";
    }

    public function auth()
    {
        $auth_array = [];
        $signature = $this->signature();
        $auth_array["signature"] = rawurlencode("type=$this->typeoftoken&ver=$this->tokenversion&sig=$signature");
        $auth_array["date"] = $this->rfc7231_date;
        return $auth_array;
    }

    public function signature()
    {
        $this->rfc7231_date = strtolower($this->UTCDateTime());
        $payload = "{$this->verb}\n{$this->resourcetype}\n{$this->resourcelink}\n{$this->rfc7231_date}\n\n";
        $key_decode = base64_decode($this->private_key);
        $hmac256 = hash_hmac("sha256", $payload, $key_decode);
        return base64_encode($hmac256);
    }

    public function UTCDateTime()
    {
        $date_utc = new \DateTime("now", new \DateTimeZone("GMT"));
        return $date_utc->format(\DateTime::RFC7231);
    }
}
