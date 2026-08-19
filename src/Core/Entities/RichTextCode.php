<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextCode Entity
 * @property string $type
 * @property RichText $text
 */
class RichTextCode extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
