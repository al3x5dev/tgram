<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StoryAreaTypeSuggestedReaction Entity
 * @property string $type
 * @property ReactionType $reaction_type
 * @property bool $is_dark
 * @property bool $is_flipped
 */
class StoryAreaTypeSuggestedReaction extends StoryAreaType
{
    
    protected function setEntities(): array
    {
        return [
            'reaction_type' => ReactionType::class,
        ];
    }
}
