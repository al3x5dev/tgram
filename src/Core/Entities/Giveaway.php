<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Giveaway Entity
 * @property Chat[] $chats
 * @property int $winners_selection_date
 * @property int $winner_count
 * @property bool $only_new_members
 * @property bool $has_public_winners
 * @property string $prize_description
 * @property array $country_codes
 * @property int $prize_star_count
 * @property int $premium_subscription_month_count
 */
class Giveaway extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chats' => [Chat::class],
        ];
    }
}
