<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaDocument Entity
 * @property string $type
 * @property string $media
 * @property string $thumbnail
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property bool $disable_content_type_detection
 */
class InputMediaDocument extends InputMedia
{
    
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
        ];
    }
}
