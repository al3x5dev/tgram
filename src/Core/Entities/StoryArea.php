<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StoryArea Entity
 * @property StoryAreaPosition $position
 * @property StoryAreaType $type
 */
class StoryArea extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'position' => StoryAreaPosition::class,
            'type' => StoryAreaType::class,
        ];
    }
}
