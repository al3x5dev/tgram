<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UsersShared Entity
 * @property int $request_id
 * @property SharedUser[] $users
 */
class UsersShared extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'users' => [SharedUser::class],
        ];
    }
}
