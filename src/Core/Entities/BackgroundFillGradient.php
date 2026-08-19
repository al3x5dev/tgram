<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BackgroundFillGradient Entity
 * @property string $type
 * @property int $top_color
 * @property int $bottom_color
 * @property int $rotation_angle
 */
class BackgroundFillGradient extends BackgroundFill
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
