<?php

namespace Msaaq\TikTok\Models;

use Msaaq\TikTok\Enums\EventName;

class Event extends Model
{
    public EventName $event;

    public string|int $event_time;

    public string $event_id;

    public ?User $user = null;

    public Property $properties;

    public ?Page $page = null;

    public function setEventName(EventName $value): self
    {
        $this->event = $value;

        return $this;
    }

    public function setEventTime($value): self
    {
        $this->event_time = $value;

        return $this;
    }

    public function setEventId($value): self
    {
        $this->event_id = $value;

        return $this;
    }

    public function setUser(User $value): self
    {
        $this->user = $value;

        return $this;
    }

    public function setProperties(Property $value): self
    {
        $this->properties = $value;

        return $this;
    }

    public function setPage(Page $value): self
    {
        $this->page = $value;

        return $this;
    }
}
