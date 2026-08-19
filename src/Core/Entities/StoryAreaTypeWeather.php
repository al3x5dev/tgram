<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StoryAreaTypeWeather Entity
 * @property string $type
 * @property float $temperature
 * @property string $emoji
 * @property int $background_color
 */
class StoryAreaTypeWeather extends StoryAreaType
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
