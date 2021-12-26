<?php

namespace App\Repositories;

use App\Domain\UrlRepositoryInterface;
use App\Http\Requests\Url\UrlDataRequest;
use App\Models\Url;

class UrlRepository implements UrlRepositoryInterface
{
    public function save(UrlDataRequest $inputData): Url
    {
        $url = new Url();
        $url->fill($inputData->toArray())
            ->save();

        return $url;
    }

    public function getLink(string $code): ?Url
    {
        return Url::where('default_code', $code)->orWhere('custom_code', $code)->first();
    }
}