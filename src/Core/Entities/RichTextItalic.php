<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextItalic Entity
 * @property string $type
 * @property RichText $text
 */
class RichTextItalic extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
