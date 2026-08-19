<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockCollage Entity
 * @property string $type
 * @property InputRichBlock[] $blocks
 * @property RichBlockCaption $caption
 */
class InputRichBlockCollage extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
