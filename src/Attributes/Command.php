<?php

namespace Mk4U\TGram\Attributes;

use Attribute;

#[Attribute]
class Command
{
    public function __construct(private string $command) {}

    public function getName(): string
    {
        return $this->command;
    }
}
