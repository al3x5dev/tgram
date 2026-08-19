<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PollAnswer Entity
 * @property string $poll_id
 * @property Chat $voter_chat
 * @property User $user
 * @property array $option_ids
 * @property array $option_persistent_ids
 */
class PollAnswer extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'voter_chat' => Chat::class,
            'user' => User::class,
        ];
    }
}
