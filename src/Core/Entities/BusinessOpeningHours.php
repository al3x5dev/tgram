<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BusinessOpeningHours Entity
 * @property string $time_zone_name
 * @property BusinessOpeningHoursInterval[] $opening_hours
 */
class BusinessOpeningHours extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'opening_hours' => [BusinessOpeningHoursInterval::class],
        ];
    }
}
