<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * EmojiTypeCustomEmoji Entity
 * @property string $type
 * @property string $custom_emoji_id
 */
class EmojiTypeCustomEmoji extends EmojiType
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
