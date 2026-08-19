<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BusinessConnection Entity
 * @property string $id
 * @property User $user
 * @property int $user_chat_id
 * @property int $date
 * @property BusinessBotRights $rights
 * @property bool $is_enabled
 */
class BusinessConnection extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
            'rights' => BusinessBotRights::class,
        ];
    }
}
