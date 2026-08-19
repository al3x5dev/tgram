<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockCollage Entity
 * @property string $type
 * @property RichBlock[] $blocks
 * @property RichBlockCaption $caption
 */
class RichBlockCollage extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
