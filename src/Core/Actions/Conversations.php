<?php

namespace Mk4U\TGram\Core\Actions;

use Mk4U\TGram\Config;
use Mk4U\TGram\Core\Actions\Traits\ConversationHandler;
use Mk4U\TGram\Core\Actions\Traits\MethodsHandler;
use Mk4U\TGram\Core\Entities\Update;

abstract class Conversations
{
    protected array $end = [];

    use ConversationHandler,
        MethodsHandler;

    public function __construct(protected Update $update)
    {
        $this->update = $update;
    }

    protected function setStep(string $step): void
    {
        Config::get('cache')->set(
            $this->getConversationIdentifier(),
            [
                'conversation' => static::class,
                'step' => $step,
                'end' => $this->getData('end', $this->end)
            ]
        );
    }

    protected function end(string ...$words): void
    {
        $this->end = array_map('mb_strtolower', $words);
    }

    public function ask(
        string $message,
        string $step
    ) {
        $this->reply($message);
        $this->setStep($step);
    }

    abstract public function start(): void;
}
