<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockPreformatted Entity
 * @property string $type
 * @property RichText $text
 * @property string $language
 */
class InputRichBlockPreformatted extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
