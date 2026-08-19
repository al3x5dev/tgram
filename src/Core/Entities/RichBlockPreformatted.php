<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockPreformatted Entity
 * @property string $type
 * @property RichText $text
 * @property string $language
 */
class RichBlockPreformatted extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
