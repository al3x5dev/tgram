<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockButtons Entity
 * @property string $type
 * @property RichMessageButton[] $buttons
 * @property string $align
 */
class InputRichBlockButtons extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'buttons' => [RichMessageButton::class],
        ];
    }
}
