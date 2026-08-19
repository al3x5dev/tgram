<?php

namespace Mk4U\TGram\Core\Actions;

use Mk4U\TGram\Core\Actions\Traits\MethodsHandler;
use Mk4U\TGram\Core\Entities\Update;

abstract class Handlers
{
    use MethodsHandler;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
    }

    abstract public function execute(): void;

}
