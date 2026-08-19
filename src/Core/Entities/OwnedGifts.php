<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * OwnedGifts Entity
 * @property int $total_count
 * @property OwnedGift[] $gifts
 * @property string $next_offset
 */
class OwnedGifts extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'gifts' => [OwnedGift::class],
        ];
    }
}
