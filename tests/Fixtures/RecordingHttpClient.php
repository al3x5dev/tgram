<?php

namespace Tests\Fixtures;

/**
 * HTTP client used to record API requests without hitting Telegram.
 */
final class RecordingHttpClient
{
    public ?string $url = null;
    public array $options = [];

    public function post(string $url, array $options = []): object
    {
        $this->url = $url;
        $this->options = $options;

        return new class {
            public function getBody(): string
            {
                return '{"ok":true,"result":true}';
            }

            public function getStatusCode(): int
            {
                return 200;
            }
        };
    }
}
