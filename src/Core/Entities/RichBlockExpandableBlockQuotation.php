<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockExpandableBlockQuotation Entity
 * @property string $type
 * @property RichBlock[] $blocks
 * @property RichText $credit
 */
class RichBlockExpandableBlockQuotation extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
            'credit' => RichText::class,
        ];
    }
}
