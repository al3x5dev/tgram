<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Gifts Entity
 * @property Gift[] $gifts
 */
class Gifts extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'gifts' => [Gift::class],
        ];
    }
}
