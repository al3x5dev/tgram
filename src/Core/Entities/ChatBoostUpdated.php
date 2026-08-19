<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBoostUpdated Entity
 * @property Chat $chat
 * @property ChatBoost $boost
 */
class ChatBoostUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'boost' => ChatBoost::class,
        ];
    }
}
