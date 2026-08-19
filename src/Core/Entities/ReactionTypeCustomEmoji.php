<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ReactionTypeCustomEmoji Entity
 * @property string $type
 * @property string $custom_emoji_id
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
