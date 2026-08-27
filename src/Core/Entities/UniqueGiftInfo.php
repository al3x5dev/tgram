<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UniqueGiftInfo Entity
 * @property UniqueGift $gift
 * @property string $origin
 * @property string $text
 * @property MessageEntity[] $entities
 * @property bool $is_private
 * @property string $last_resale_currency
 * @property int $last_resale_amount
 * @property string $owned_gift_id
 * @property int $transfer_star_count
 * @property int $next_transfer_date
 */
class UniqueGiftInfo extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'gift' => UniqueGift::class,
            'entities' => [MessageEntity::class],
        ];
    }
}
