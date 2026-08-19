<?php

namespace Mk4U\TGram\Core\Actions;

use Mk4U\TGram\Core\Actions\Traits\MethodsHandler;
use Mk4U\TGram\Core\Entities\Update;

abstract class Middlewares
{
    protected Update $update;
    use MethodsHandler;

    public function __construct(Update $update)
    {
        $this->update = $update;
    }

    abstract public function handle(\Closure $next);

    protected function abort(?string $message = null, array $params = []): bool
    {
        if ($message !== null && $message !== '') {
            $this->reply($message, $params);
        }

        return false;
    }
}
