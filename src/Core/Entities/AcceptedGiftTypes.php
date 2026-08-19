<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * AcceptedGiftTypes Entity
 * @property bool $unlimited_gifts
 * @property bool $limited_gifts
 * @property bool $unique_gifts
 * @property bool $premium_subscription
 * @property bool $gifts_from_channels
 */
class AcceptedGiftTypes extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
