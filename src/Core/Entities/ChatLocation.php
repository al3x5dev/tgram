<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatLocation Entity
 * @property Location $location
 * @property string $address
 */
class ChatLocation extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
