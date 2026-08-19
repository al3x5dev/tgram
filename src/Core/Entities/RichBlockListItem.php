<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockListItem Entity
 * @property string $label
 * @property RichBlock[] $blocks
 * @property bool $has_checkbox
 * @property bool $is_checked
 * @property int $value
 * @property string $type
 */
class RichBlockListItem extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
        ];
    }
}
