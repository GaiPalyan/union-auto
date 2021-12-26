<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\UrlManager;
use App\Http\Requests\Url\StoreUrlRequest;
use App\Models\Url;
use App\View\LinkBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UrlController extends Controller
{
    private UrlManager $manager;

    public function __construct(UrlManager $manager)
    {
        $this->manager = $manager;
        $this->authorizeResource(Url::class, 'url');
    }

    public function store(StoreUrlRequest $request, Response $response): array
    {
        try {
            $shortUrl = $this->manager->saveUrl($request->getInputData());
        } catch (\Exception $e) {
            return $e->getCode();
        }

        $statusCode = $response->getStatusCode();

        $shortLink = LinkBuilder::getLink($shortUrl, $request->getPort());
        return compact('shortLink', 'statusCode');
    }

    public function redirect(string $code): RedirectResponse|JsonResponse
    {
        $url = $this->manager->getUrl($code);

        if ($url) {
            $link = $url->getAttribute('link');
            return redirect($link, 301);
        }

        return response()->json('Bad link, try create one');
    }
}
