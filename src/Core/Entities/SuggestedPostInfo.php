<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SuggestedPostInfo Entity
 * @property string $state
 * @property SuggestedPostPrice $price
 * @property int $send_date
 */
class SuggestedPostInfo extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'price' => SuggestedPostPrice::class,
        ];
    }
}
