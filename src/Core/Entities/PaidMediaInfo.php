<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PaidMediaInfo Entity
 * @property int $star_count
 * @property PaidMedia[] $paid_media
 */
class PaidMediaInfo extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'paid_media' => [PaidMedia::class],
        ];
    }
}
