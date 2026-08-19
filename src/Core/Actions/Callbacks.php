<?php

namespace Mk4U\TGram\Core\Actions;

use Mk4U\TGram\Core\Actions\Traits\MethodsHandler;
use Mk4U\TGram\Core\Entities\CallbackQuery;
use Mk4U\TGram\Core\Entities\InaccessibleMessage;
use Mk4U\TGram\Core\Entities\MaybeInaccessibleMessage;
use Mk4U\TGram\Core\Entities\Message;
use Mk4U\TGram\Core\Entities\Update;

abstract class Callbacks
{
    public ?CallbackQuery $callback;
    public ?MaybeInaccessibleMessage $message;
    protected ?string $callbackParam = null;


    use MethodsHandler;

    public function __construct(protected Update $update)
    {
        $this->callback = $update->getCallbackQuery();
        $this->message = $this->callback->getMessage();
    }

    abstract public function execute(): void;

    public function message(): Message|InaccessibleMessage
    {
        return $this->message->resolve();
    }

    public function setParam(?string $param): static
    {
        $this->callbackParam = $param;
        return $this;
    }

    public function getParam(): ?string
    {
        return $this->callbackParam;
    }
}
