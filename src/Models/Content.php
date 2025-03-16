<?php

namespace Msaaq\TikTok\Models;

class Content extends Model
{
    /** @var float|int|null */
    public $price;

    /** @var int|null */
    public $quantity;

    /** @var string|null */
    public $content_id;

    /** @var string|null */
    public $content_name;

    /** @var string|null */
    public $content_category;

    /** @var string|null */
    public $brand;

    /**
     * @param float|int $value
     * @return $this
     */
    public function setPrice($value): self
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
