<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaSticker Entity
 * @property string $type
 * @property string $media
 * @property string $emoji
 */
class InputMediaSticker extends InputPollOptionMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
