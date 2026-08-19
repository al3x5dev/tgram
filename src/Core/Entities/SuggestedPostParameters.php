<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SuggestedPostParameters Entity
 * @property SuggestedPostPrice $price
 * @property int $send_date
 */
class SuggestedPostParameters extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'price' => SuggestedPostPrice::class,
        ];
    }
}
