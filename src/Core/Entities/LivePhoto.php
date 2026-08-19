<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * LivePhoto Entity
 * @property PhotoSize[] $photo
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $width
 * @property int $height
 * @property int $duration
 * @property string $mime_type
 * @property int $file_size
 */
class LivePhoto extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
