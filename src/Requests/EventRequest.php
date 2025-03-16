<?php

namespace Msaaq\TikTok\Requests;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Msaaq\TikTok\Constants\EventSource;
use Msaaq\TikTok\Exceptions\AccessTokenIncorrectOrRevokedException;
use Msaaq\TikTok\Exceptions\NoPermissionException;
use Msaaq\TikTok\Models\Event;

class EventRequest
{
    /** @var string */
    private $event_source;

    /** @var string */
    public $event_source_id;

    /** @var string|null */
    public $test_event_code = null;

    /** @var PendingRequest */
    private $http;

    public function __construct(PendingRequest $http)
    {
        $this->http = $http;
    }

    public function setPixelCode(string $code): self
    {
        $this->event_source_id = $code;
        return $this;
    }

    public function setEventSource(string $eventSource): self
    {
        $this->event_source = $eventSource;
        return $this;
    }

    public function setTestEventCode(string $testCode): self
    {
        $this->test_event_code = $testCode;
        return $this;
    }

    /**
     * @param Event|Event[] $events
     * @throws Exception
     */
    public function execute($events): array
    {
        $events = is_array($events) ? $events : [$events];
        foreach ($events as $key => $event) {
            $events[$key] = $event->toArray();
        }

        $request = $this->http->post('/event/track/', [
            'event_source' => $this->event_source,
            'event_source_id' => $this->event_source_id,
            'test_event_code' => $this->test_event_code,
            'data' => $events,
        ]);

        $request->onError(function ($request) {
            $errorCode = $request->json('code');
            
            if ($errorCode === 40001) {
                throw new NoPermissionException($request->json('message'));
            } elseif ($errorCode === 40105) {
                throw new AccessTokenIncorrectOrRevokedException($request->json('message'));
            } else {
                throw new Exception($request->json('message'), $errorCode);
            }
        });

        return $request->json();
    }
}
