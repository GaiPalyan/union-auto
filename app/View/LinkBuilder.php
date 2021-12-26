<?php

declare(strict_types=1);

namespace App\View;

use App\Models\Url;

class LinkBuilder
{
    private const SERVICE_TYPE = 'api';
    static private string $serviceAddress;

    public static function getLink(Url $shortedUrl, int $port): string
    {
        self::$serviceAddress = config('app.debug')
                                ? implode(':', [config('app.url'), $port])
                                : config('app.url');

        $code = $shortedUrl->getAttribute('custom_code') ?: $shortedUrl->getAttribute('default_code');
        $linkParts = [self::$serviceAddress, self::SERVICE_TYPE, $code];

        return implode('/', $linkParts);
    }
}
