<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockParagraph Entity
 * @property string $type
 * @property RichText $text
 */
class InputRichBlockParagraph extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
