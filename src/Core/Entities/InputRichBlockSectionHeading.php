<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockSectionHeading Entity
 * @property string $type
 * @property RichText $text
 * @property int $size
 */
class InputRichBlockSectionHeading extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
