<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockSectionHeading Entity
 * @property string $type
 * @property RichText $text
 * @property int $size
 */
class RichBlockSectionHeading extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
