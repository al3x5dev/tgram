<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * AreaPosition Entity
 * @property float $x_percentage
 * @property float $y_percentage
 * @property float $width_percentage
 * @property float $height_percentage
 * @property float $rotation_angle
 * @property float $corner_radius_percentage
 */
class AreaPosition extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
