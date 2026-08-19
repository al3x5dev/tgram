<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * LocationAddress Entity
 * @property string $country_code
 * @property string $state
 * @property string $city
 * @property string $street
 */
class LocationAddress extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
