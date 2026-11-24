<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockExpandableBlockQuotation Entity
 * @property string $type
 * @property InputRichBlock[] $blocks
 * @property RichText $credit
 */
class InputRichBlockExpandableBlockQuotation extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'credit' => RichText::class,
        ];
    }
}
