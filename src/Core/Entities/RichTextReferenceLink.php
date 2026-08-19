<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextReferenceLink Entity
 * @property string $type
 * @property RichText $text
 * @property string $reference_name
 */
class RichTextReferenceLink extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
