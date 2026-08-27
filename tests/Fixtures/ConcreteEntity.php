<?php

namespace Tests\Fixtures;

use Mk4U\TGram\Core\Entity;

class ConcreteEntity extends Entity
{
    protected function setEntities(): array
    {
        return [
            'child' => self::class,
            'children' => [self::class],
        ];
    }
}
