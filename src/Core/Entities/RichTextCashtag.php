<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextCashtag Entity
 * @property string $type
 * @property RichText $text
 * @property string $cashtag
 */
class RichTextCashtag extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
