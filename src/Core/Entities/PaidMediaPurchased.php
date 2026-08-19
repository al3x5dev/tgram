<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PaidMediaPurchased Entity
 * @property User $from
 * @property string $paid_media_payload
 */
class PaidMediaPurchased extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
        ];
    }
}
