<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BusinessLocation Entity
 * @property string $address
 * @property Location $location
 */
class BusinessLocation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
