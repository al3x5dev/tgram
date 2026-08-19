<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PaidMediaLivePhoto Entity
 * @property string $type
 * @property LivePhoto $live_photo
 */
class PaidMediaLivePhoto extends PaidMedia
{
    
    protected function setEntities(): array
    {
        return [
            'live_photo' => LivePhoto::class,
        ];
    }
}
