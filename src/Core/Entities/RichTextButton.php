<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextButton Entity
 * @property string $type
 * @property RichMessageButton $button
 */
class RichTextButton extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'button' => RichMessageButton::class,
        ];
    }
}
