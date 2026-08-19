<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ReactionCount Entity
 * @property ReactionType $type
 * @property int $total_count
 */
class ReactionCount extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'type' => ReactionType::class,
        ];
    }
}
