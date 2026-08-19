<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockPullQuotation Entity
 * @property string $type
 * @property RichText $text
 * @property RichText $credit
 */
class RichBlockPullQuotation extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'credit' => RichText::class,
        ];
    }
}
