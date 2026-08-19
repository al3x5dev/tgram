<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputProfilePhotoAnimated Entity
 * @property string $type
 * @property string $animation
 * @property float $main_frame_timestamp
 */
class InputProfilePhotoAnimated extends InputProfilePhoto
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
