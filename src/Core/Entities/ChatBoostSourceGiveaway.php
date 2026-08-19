<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBoostSourceGiveaway Entity
 * @property string $source
 * @property int $giveaway_message_id
 * @property User $user
 * @property int $prize_star_count
 * @property bool $is_unclaimed
 */
class ChatBoostSourceGiveaway extends ChatBoostSource
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
