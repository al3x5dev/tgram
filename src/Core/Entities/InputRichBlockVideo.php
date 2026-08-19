<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockVideo Entity
 * @property string $type
 * @property InputMediaVideo $video
 * @property RichBlockCaption $caption
 */
class InputRichBlockVideo extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'video' => InputMediaVideo::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
