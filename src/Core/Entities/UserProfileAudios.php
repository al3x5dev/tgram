<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UserProfileAudios Entity
 * @property int $total_count
 * @property Audio[] $audios
 */
class UserProfileAudios extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'audios' => [Audio::class],
        ];
    }
}
