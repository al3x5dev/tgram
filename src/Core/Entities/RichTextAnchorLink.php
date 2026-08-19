<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextAnchorLink Entity
 * @property string $type
 * @property RichText $text
 * @property string $anchor_name
 */
class RichTextAnchorLink extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
