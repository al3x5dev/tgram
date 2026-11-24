<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextTonAddress Entity
 * @property string $type
 * @property RichText $text
 * @property string $address
 */
class RichTextTonAddress extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
