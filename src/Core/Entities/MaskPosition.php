<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MaskPosition Entity
 * @property string $point
 * @property float $x_shift
 * @property float $y_shift
 * @property float $scale
 */
class MaskPosition extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
