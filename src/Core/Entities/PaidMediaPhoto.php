<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PaidMediaPhoto Entity
 * @property string $type
 * @property PhotoSize[] $photo
 */
class PaidMediaPhoto extends PaidMedia
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
