<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BackgroundTypeWallpaper Entity
 * @property string $type
 * @property Document $document
 * @property int $dark_theme_dimming
 * @property bool $is_blurred
 * @property bool $is_moving
 */
class BackgroundTypeWallpaper extends BackgroundType
{
    
    protected function setEntities(): array
    {
        return [
            'document' => Document::class,
        ];
    }
}
