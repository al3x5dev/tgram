<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StoryArea Entity
 * @property AreaPosition $position
 * @property StoryAreaType $type
 */
class StoryArea extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'position' => AreaPosition::class,
            'type' => StoryAreaType::class,
        ];
    }
}
