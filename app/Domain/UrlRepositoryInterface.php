<?php

declare(strict_types=1);

namespace App\Domain;

use App\Http\Requests\Url\UrlDataRequest;
use App\Models\Url;

interface UrlRepositoryInterface
{
    public function save(UrlDataRequest $inputData): Url;
    public function getLink(string $code): ?Url;
}