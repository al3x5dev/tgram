<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ShippingQuery Entity
 * @property string $id
 * @property User $from
 * @property string $invoice_payload
 * @property ShippingAddress $shipping_address
 */
class ShippingQuery extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
