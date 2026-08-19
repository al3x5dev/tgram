<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichMessage Entity
 * @property RichBlock[] $blocks
 * @property bool $is_rtl
 */
class RichMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
        ];
    }
}
