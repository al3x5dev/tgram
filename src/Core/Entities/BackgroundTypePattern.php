<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BackgroundTypePattern Entity
 * @property string $type
 * @property Document $document
 * @property BackgroundFill $fill
 * @property int $intensity
 * @property bool $is_inverted
 * @property bool $is_moving
 */
class BackgroundTypePattern extends BackgroundType
{
    
    protected function setEntities(): array
    {
        return [
            'document' => Document::class,
            'fill' => BackgroundFill::class,
        ];
    }
}
