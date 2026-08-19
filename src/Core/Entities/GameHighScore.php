<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * GameHighScore Entity
 * @property int $position
 * @property User $user
 * @property int $score
 */
class GameHighScore extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
