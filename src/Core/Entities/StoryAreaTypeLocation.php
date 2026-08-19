<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StoryAreaTypeLocation Entity
 * @property string $type
 * @property float $latitude
 * @property float $longitude
 * @property LocationAddress $address
 */
class StoryAreaTypeLocation extends StoryAreaType
{
    
    protected function setEntities(): array
    {
        return [
            'address' => LocationAddress::class,
        ];
    }
}
