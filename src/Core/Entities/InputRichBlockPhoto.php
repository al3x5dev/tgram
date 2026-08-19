<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockPhoto Entity
 * @property string $type
 * @property InputMediaPhoto $photo
 * @property RichBlockCaption $caption
 */
class InputRichBlockPhoto extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => InputMediaPhoto::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
