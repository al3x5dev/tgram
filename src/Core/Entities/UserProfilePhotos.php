<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * UserProfilePhotos Entity
 * @property int $total_count
 * @property PhotoSize[] $photos
 */
class UserProfilePhotos extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photos' => [PhotoSize::class],
        ];
    }
}
