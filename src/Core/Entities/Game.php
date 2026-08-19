<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Game Entity
 * @property string $title
 * @property string $description
 * @property PhotoSize[] $photo
 * @property string $text
 * @property MessageEntity[] $text_entities
 * @property Animation $animation
 */
class Game extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
            'text_entities' => [MessageEntity::class],
            'animation' => Animation::class,
        ];
    }
}
