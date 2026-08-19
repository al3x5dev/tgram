<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PhotoSize Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $width
 * @property int $height
 * @property int $file_size
 */
class PhotoSize extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
