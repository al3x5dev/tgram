<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaAudio Entity
 * @property string $type
 * @property string $media
 * @property string $thumbnail
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property int $duration
 * @property string $performer
 * @property string $title
 */
class InputMediaAudio extends InputMedia
{
    
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
        ];
    }
}
