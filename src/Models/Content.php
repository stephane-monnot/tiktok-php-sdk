<?php

namespace Msaaq\TikTok\Models;

class Content extends Model
{
    public float|int|null $price;

    public ?int $quantity;

    public ?string $content_id;

    public ?string $content_name;

    public ?string $content_category;

    public ?string $brand;

    public function setPrice(float|int $value): self
    {
        $this->price = $value;

        return $this;
    }

    public function setQuantity(int $value): self
    {
        $this->quantity = $value;

        return $this;
    }

    public function setContentId(string $value): self
    {
        $this->content_id = $value;

        return $this;
    }

    public function setContentName(string $value): self
    {
        $this->content_name = $value;

        return $this;
    }

    public function setContentCategory(string $value): self
    {
        $this->content_category = $value;

        return $this;
    }

    public function setBrand(string $value): self
    {
        $this->brand = $value;

        return $this;
    }
}
