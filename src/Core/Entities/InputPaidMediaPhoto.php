<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputPaidMediaPhoto Entity
 * @property string $type
 * @property string $media
 */
class InputPaidMediaPhoto extends InputPaidMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
