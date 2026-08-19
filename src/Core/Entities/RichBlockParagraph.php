<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockParagraph Entity
 * @property string $type
 * @property RichText $text
 */
class RichBlockParagraph extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
