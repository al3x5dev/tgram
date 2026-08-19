<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockPullQuotation Entity
 * @property string $type
 * @property RichText $text
 * @property RichText $credit
 */
class InputRichBlockPullQuotation extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'credit' => RichText::class,
        ];
    }
}
