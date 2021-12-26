<?php

declare(strict_types=1);

namespace App\Http\Requests\Url;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreUrlRequest extends FormRequest
{

    protected function prepareForValidation(): void
    {
        $url = $this->input('name');

        if (!Str::startsWith($url, ['http://', 'https://'])) {
            $this->merge(['name' => "https://$url"]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'url', 'max:255'],
            'custom_code' => ['max:255']
        ];
    }

    public function sanitize(string $name): string
    {
        $parts = parse_url($name);
        $normalized = strtolower("{$parts['host']}{$parts['path']}");
        $normalized .= array_key_exists('query', $parts) ? "?{$parts['query']}" : '';

        return "{$parts['scheme']}://$normalized";
    }

    public function getInputData(): UrlDataRequest
    {
        return new UrlDataRequest(
            $this->sanitize($this->input('name')),
            Str::random(6),
            $this->input('custom_code')
        );
    }
}
