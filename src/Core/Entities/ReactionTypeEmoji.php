<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ReactionTypeEmoji Entity
 * @property string $type
 * @property string $emoji
 */
class ReactionTypeEmoji extends ReactionType
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
