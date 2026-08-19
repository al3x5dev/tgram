<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ShippingAddress Entity
 * @property string $country_code
 * @property string $state
 * @property string $city
 * @property string $street_line1
 * @property string $street_line2
 * @property string $post_code
 */
class ShippingAddress extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
