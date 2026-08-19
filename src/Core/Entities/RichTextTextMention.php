<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextTextMention Entity
 * @property string $type
 * @property RichText $text
 * @property User $user
 */
class RichTextTextMention extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'user' => User::class,
        ];
    }
}
