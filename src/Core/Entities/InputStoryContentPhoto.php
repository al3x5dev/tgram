<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputStoryContentPhoto Entity
 * @property string $type
 * @property string $photo
 */
class InputStoryContentPhoto extends InputStoryContent
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
