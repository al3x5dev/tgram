<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockVoiceNote Entity
 * @property string $type
 * @property InputMediaVoiceNote $voice_note
 * @property RichBlockCaption $caption
 */
class InputRichBlockVoiceNote extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'voice_note' => InputMediaVoiceNote::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
