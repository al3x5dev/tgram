<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockList Entity
 * @property string $type
 * @property RichBlockListItem[] $items
 */
class RichBlockList extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'items' => [RichBlockListItem::class],
        ];
    }
}
