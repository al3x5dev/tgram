<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockVoiceNote Entity
 * @property string $type
 * @property Voice $voice_note
 * @property RichBlockCaption $caption
 */
class RichBlockVoiceNote extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'voice_note' => Voice::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
