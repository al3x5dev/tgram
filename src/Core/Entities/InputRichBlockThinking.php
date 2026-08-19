<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockThinking Entity
 * @property string $type
 * @property RichText $text
 */
class InputRichBlockThinking extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
