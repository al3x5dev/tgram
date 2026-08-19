<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputTextMessageContent Entity
 * @property string $message_text
 * @property string $parse_mode
 * @property MessageEntity[] $entities
 * @property LinkPreviewOptions $link_preview_options
 */
class InputTextMessageContent extends InputMessageContent
{
    
    protected function setEntities(): array
    {
        return [
            'entities' => [MessageEntity::class],
            'link_preview_options' => LinkPreviewOptions::class,
        ];
    }
}
