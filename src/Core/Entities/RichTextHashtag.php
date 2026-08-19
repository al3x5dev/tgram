<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextHashtag Entity
 * @property string $type
 * @property RichText $text
 * @property string $hashtag
 */
class RichTextHashtag extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
