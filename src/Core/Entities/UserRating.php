<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UserRating Entity
 * @property int $level
 * @property int $rating
 * @property int $current_level_rating
 * @property int $next_level_rating
 */
class UserRating extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
