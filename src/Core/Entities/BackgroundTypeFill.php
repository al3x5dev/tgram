<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BackgroundTypeFill Entity
 * @property string $type
 * @property BackgroundFill $fill
 * @property int $dark_theme_dimming
 */
class BackgroundTypeFill extends BackgroundType
{
    
    protected function setEntities(): array
    {
        return [
            'fill' => BackgroundFill::class,
        ];
    }
}
