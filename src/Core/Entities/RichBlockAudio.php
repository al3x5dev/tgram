<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockAudio Entity
 * @property string $type
 * @property Audio $audio
 * @property RichBlockCaption $caption
 */
class RichBlockAudio extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'audio' => Audio::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
