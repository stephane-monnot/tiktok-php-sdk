<?php

namespace Msaaq\TikTok\Models;

class User extends Model
{
    /** @var string|null */
    public $ttclid = '';

    /** @var string|null */
    public $ttp = '';

    /** @var string|null */
    public $ip = '';

    /** @var string|null */
    public $user_agent = '';

    /** @var array */
    public $email;

    /** @var array */
    public $phone;

    /** @var array */
    public $external_id;

    public function setClickId(?string $ttclid): self
    {
        $this->ttclid = $ttclid ?? '';

        return $this;
    }

    public function setCookieId(?string $ttp): self
    {
        $this->ttp = $ttp ?? '';

        return $this;
    }

    public function setIpAddress(?string $ip): self
    {
        $this->ip = $ip ?? '';

        return $this;
    }

    public function setUserAgent(?string $userAgent): self
    {
        $this->user_agent = $userAgent ?? '';

        return $this;
    }

    public function setEmails(array $emails): self
    {
        $this->email = $this->hashArrayValue($emails);

        return $this;
    }

    public function setPhones(array $phones): self
    {
        $this->phone = $this->hashArrayValue($phones);

        return $this;
    }

    public function setExternalIds(array $ids): self
    {
        $this->external_id = $this->hashArrayValue($ids);

        return $this;
    }
}
