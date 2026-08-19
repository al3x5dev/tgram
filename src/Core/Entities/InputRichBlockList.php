<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockList Entity
 * @property string $type
 * @property InputRichBlockListItem[] $items
 */
class InputRichBlockList extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'items' => [InputRichBlockListItem::class],
        ];
    }
}
