<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextAnchor Entity
 * @property string $type
 * @property string $name
 */
class RichTextAnchor extends RichText
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
