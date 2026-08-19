<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaVoiceNote Entity
 * @property string $type
 * @property string $media
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property int $duration
 */
class InputMediaVoiceNote extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
        ];
    }
}
