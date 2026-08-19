<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Voice Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $duration
 * @property string $mime_type
 * @property int $file_size
 */
class Voice extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
