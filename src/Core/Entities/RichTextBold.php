<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextBold Entity
 * @property string $type
 * @property RichText $text
 */
class RichTextBold extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
