<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockButtons Entity
 * @property string $type
 * @property RichMessageButton[] $buttons
 * @property string $align
 */
class RichBlockButtons extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'buttons' => [RichMessageButton::class],
        ];
    }
}
