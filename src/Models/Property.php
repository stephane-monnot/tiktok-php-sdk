<?php

namespace Msaaq\TikTok\Models;

class Property extends Model
{
    /**
     * @var Content[]
     */
    public array $contents;

    public ?string $content_type = '';

    public ?string $currency = '';

    public ?float $value = null;

    public ?string $query = '';

    public ?string $description = '';

    public string|int|null $order_id = '';

    public string|int|null $shop_id = '';

    /**
     * @param  Content[]  $value
     * @return $this
     */
    public function setContents(array $value): self
    {
        $this->contents = $value;

        return $this;
    }

    public function setContentType(?string $value): self
    {
        $this->content_type = $value ?? '';

        return $this;
    }

    public function setCurrency(?string $value): self
    {
        $this->currency = $value ?? '';

        return $this;
    }

    public function setValue(?float $value): self
    {
        $this->value = $value ?? '';

        return $this;
    }

    public function setQuery(?string $value): self
    {
        $this->query = $value ?? '';

        return $this;
    }

    public function setDescription(?string $value): self
    {
        $this->description = $value ?? '';

        return $this;
    }

    public function setOrderId(string|int|null $value): self
    {
        $this->order_id = (string) $value ?? '';

        return $this;
    }

    public function setShopId(string|int|null $value): self
    {
        $this->shop_id = $value ?? '';

        return $this;
    }
}
