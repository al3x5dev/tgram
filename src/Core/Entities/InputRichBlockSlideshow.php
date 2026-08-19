<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockSlideshow Entity
 * @property string $type
 * @property InputRichBlock[] $blocks
 * @property RichBlockCaption $caption
 */
class InputRichBlockSlideshow extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
