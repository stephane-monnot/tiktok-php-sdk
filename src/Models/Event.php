<?php

namespace Msaaq\TikTok\Models;

use Msaaq\TikTok\Constants\EventName;

class Event extends Model
{
    /** @var string */
    public $event;

    /** @var string|int */
    public $event_time;

    /** @var string */
    public $event_id;

    /** @var User|null */
    public $user = null;

    /** @var Property */
    public $properties;

    /** @var Page|null */
    public $page = null;

    /**
     * @param string $value
     * @return $this
     */
    public function setEventName(string $value): self
    {
        $this->event = $value;
        return $this;
    }

    public function setEventTime($value): self
    {
        $this->event_time = $value;

        return $this;
    }

    public function setEventId(string $value): self
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
