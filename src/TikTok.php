<?php

namespace Msaaq\TikTok;

use Illuminate\Http\Client\PendingRequest;
use Msaaq\TikTok\Requests\EventRequest;
use Msaaq\TikTok\Support\HttpClient;

class TikTok
{
    /** @var PendingRequest */
    private $http;
    
    /** @var string */
    private $accessToken;
    
    /** @var string */
    private $pixelId;

    public function __construct(string $accessToken, string $pixelId)
    {
        $this->accessToken = $accessToken;
        $this->pixelId = $pixelId;
        $this->http = HttpClient::http($this->accessToken);
    }

    public function events(): EventRequest
    {
        return (new EventRequest($this->http))->setPixelCode($this->pixelId);
    }

    public function client(): PendingRequest
    {
        return $this->http;
    }
}
