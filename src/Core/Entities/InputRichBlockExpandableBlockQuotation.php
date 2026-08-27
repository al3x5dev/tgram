<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockExpandableBlockQuotation Entity
 * @property string $type
 * @property RichText $text
 * @property RichText $credit
 */
class InputRichBlockExpandableBlockQuotation extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'credit' => RichText::class,
        ];
    }
}
