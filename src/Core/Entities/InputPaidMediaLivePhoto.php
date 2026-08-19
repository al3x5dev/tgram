<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputPaidMediaLivePhoto Entity
 * @property string $type
 * @property string $media
 * @property string $photo
 */
class InputPaidMediaLivePhoto extends InputPaidMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
