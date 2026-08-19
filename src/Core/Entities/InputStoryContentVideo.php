<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputStoryContentVideo Entity
 * @property string $type
 * @property string $video
 * @property float $duration
 * @property float $cover_frame_timestamp
 * @property bool $is_animation
 */
class InputStoryContentVideo extends InputStoryContent
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
