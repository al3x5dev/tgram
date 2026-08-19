<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ProximityAlertTriggered Entity
 * @property User $traveler
 * @property User $watcher
 * @property int $distance
 */
class ProximityAlertTriggered extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'traveler' => User::class,
            'watcher' => User::class,
        ];
    }
}
