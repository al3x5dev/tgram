<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockAnimation Entity
 * @property string $type
 * @property InputMediaAnimation $animation
 * @property RichBlockCaption $caption
 */
class InputRichBlockAnimation extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'animation' => InputMediaAnimation::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
