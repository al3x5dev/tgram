<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UserChatBoosts Entity
 * @property ChatBoost[] $boosts
 */
class UserChatBoosts extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'boosts' => [ChatBoost::class],
        ];
    }
}
