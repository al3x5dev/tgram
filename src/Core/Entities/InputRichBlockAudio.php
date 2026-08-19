<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockAudio Entity
 * @property string $type
 * @property InputMediaAudio $audio
 * @property RichBlockCaption $caption
 */
class InputRichBlockAudio extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'audio' => InputMediaAudio::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
