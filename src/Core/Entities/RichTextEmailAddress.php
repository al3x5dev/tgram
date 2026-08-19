<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextEmailAddress Entity
 * @property string $type
 * @property RichText $text
 * @property string $email_address
 */
class RichTextEmailAddress extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
