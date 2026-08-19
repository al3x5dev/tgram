<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaLocation Entity
 * @property string $type
 * @property float $latitude
 * @property float $longitude
 * @property float $horizontal_accuracy
 */
class InputMediaLocation extends InputPollOptionMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
