<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichMessageMedia Entity
 * @property string $id
 * @property InputMediaAnimation|InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo|InputMediaVoiceNote $media
 */
class InputRichMessageMedia extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'media' => InputMediaAnimation::class,
        ];
    }
}
