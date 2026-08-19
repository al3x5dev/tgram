<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PaidMediaPreview Entity
 * @property string $type
 * @property int $width
 * @property int $height
 * @property int $duration
 */
class PaidMediaPreview extends PaidMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
