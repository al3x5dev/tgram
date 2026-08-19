<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockListItem Entity
 * @property InputRichBlock[] $blocks
 * @property bool $has_checkbox
 * @property bool $is_checked
 * @property int $value
 * @property string $type
 */
class InputRichBlockListItem extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
        ];
    }
}
