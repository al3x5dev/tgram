<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ShippingOption Entity
 * @property string $id
 * @property string $title
 * @property LabeledPrice[] $prices
 */
class ShippingOption extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'prices' => [LabeledPrice::class],
        ];
    }
}
