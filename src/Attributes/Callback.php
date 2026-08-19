<?php

namespace Mk4U\TGram\Attributes;

use Attribute;

#[Attribute]
class Callback
{
    public function __construct(private string $action) {}

    public function getName() : string
    {
        return $this->action;
    }
}
