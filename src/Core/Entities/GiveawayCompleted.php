<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * GiveawayCompleted Entity
 * @property int $winner_count
 * @property int $unclaimed_prize_count
 * @property Message $giveaway_message
 * @property bool $is_star_giveaway
 */
class GiveawayCompleted extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'giveaway_message' => Message::class,
        ];
    }
}
