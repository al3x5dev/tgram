<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StoryAreaPosition Entity
 * @property float $x_percentage
 * @property float $y_percentage
 * @property float $width_percentage
 * @property float $height_percentage
 * @property float $rotation_angle
 * @property float $corner_radius_percentage
 */
class StoryAreaPosition extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
