<?php

declare(strict_types=1);

namespace App\Domain;

use App\Http\Requests\Url\UrlDataRequest;
use App\Models\Url;

class UrlManager
{
    private UrlRepositoryInterface $repository;

    public function __construct(UrlRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function saveUrl(UrlDataRequest $data): Url
    {
        return $this->repository->save($data);
    }

    public function getUrl(string $code): ?Url
    {
        return $this->repository->getLink($code);
    }
}