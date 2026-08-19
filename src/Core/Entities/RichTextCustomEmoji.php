<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextCustomEmoji Entity
 * @property string $type
 * @property string $custom_emoji_id
 * @property string $alternative_text
 */
class RichTextCustomEmoji extends RichText
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
