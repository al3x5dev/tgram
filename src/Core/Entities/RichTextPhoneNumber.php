<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextPhoneNumber Entity
 * @property string $type
 * @property RichText $text
 * @property string $phone_number
 */
class RichTextPhoneNumber extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
