<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockBlockQuotation Entity
 * @property string $type
 * @property RichBlock[] $blocks
 * @property RichText $credit
 */
class RichBlockBlockQuotation extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
            'credit' => RichText::class,
        ];
    }
}
