<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StarTransaction Entity
 * @property string $id
 * @property int $amount
 * @property int $nanostar_amount
 * @property int $date
 * @property TransactionPartner $source
 * @property TransactionPartner $receiver
 */
class StarTransaction extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'source' => TransactionPartner::class,
            'receiver' => TransactionPartner::class,
        ];
    }
}
