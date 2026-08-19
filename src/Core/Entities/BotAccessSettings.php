<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotAccessSettings Entity
 * @property bool $is_access_restricted
 * @property User[] $added_users
 */
class BotAccessSettings extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'added_users' => [User::class],
        ];
    }
}
