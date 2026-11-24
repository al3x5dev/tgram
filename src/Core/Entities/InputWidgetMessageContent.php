<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputWidgetMessageContent Entity
 * @property string $html
 * @property int $width
 * @property int $height
 * @property string $public_data
 * @property string $chat_data
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property bool $show_caption_above_media
 * @property bool $allow_queries
 * @property bool $is_shared
 */
class InputWidgetMessageContent extends InputMessageContent
{
    
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
        ];
    }
}
