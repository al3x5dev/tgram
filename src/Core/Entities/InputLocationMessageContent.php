<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputLocationMessageContent Entity
 * @property float $latitude
 * @property float $longitude
 * @property float $horizontal_accuracy
 * @property int $live_period
 * @property int $heading
 * @property int $proximity_alert_radius
 */
class InputLocationMessageContent extends InputMessageContent
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
