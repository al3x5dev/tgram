<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputPaidMediaVideo Entity
 * @property string $type
 * @property string $media
 * @property string $thumbnail
 * @property string $cover
 * @property int $start_timestamp
 * @property int $width
 * @property int $height
 * @property int $duration
 * @property bool $supports_streaming
 */
class InputPaidMediaVideo extends InputPaidMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
