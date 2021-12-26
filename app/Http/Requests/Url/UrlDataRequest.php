<?php

declare(strict_types=1);

namespace App\Http\Requests\Url;

class UrlDataRequest
{
    private string $link;
    private string $default_code;
    private ?string $custom_code;

    public function __construct(string $link, string $default_code, ?string $custom_name)
    {
        $this->link = $link;
        $this->default_code = $default_code;
        $this->custom_code = $custom_name;
    }

    public function getName(): string
    {
        return $this->link;
    }

    public function getCustomName(): ?string
    {
        return $this->custom_code;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}