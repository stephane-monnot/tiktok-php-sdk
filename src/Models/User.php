<?php

namespace Msaaq\TikTok\Models;

class User extends Model
{
    /**
     * TikTok Click ID
     */
    public ?string $ttclid = '';

    /**
     * Cookie ID (_ttp).
     */
    public ?string $ttp = '';

    public ?string $ip = '';

    public ?string $user_agent = '';

    public array $email;

    public array $phone;

    public array $external_id;

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
