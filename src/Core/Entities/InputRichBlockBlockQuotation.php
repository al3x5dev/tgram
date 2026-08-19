<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockBlockQuotation Entity
 * @property string $type
 * @property InputRichBlock[] $blocks
 * @property RichText $credit
 */
class InputRichBlockBlockQuotation extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'credit' => RichText::class,
        ];
    }
}
