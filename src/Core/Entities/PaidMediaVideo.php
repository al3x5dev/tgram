<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PaidMediaVideo Entity
 * @property string $type
 * @property Video $video
 */
class PaidMediaVideo extends PaidMedia
{
    
    protected function setEntities(): array
    {
        return [
            'video' => Video::class,
        ];
    }
}
