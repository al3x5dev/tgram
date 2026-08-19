<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SharedUser Entity
 * @property int $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property PhotoSize[] $photo
 */
class SharedUser extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
