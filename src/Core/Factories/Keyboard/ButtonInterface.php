<?php

namespace Mk4U\TGram\Core\Factories\Keyboard;

interface ButtonInterface
{
    public static function make(string $text): self;
}
