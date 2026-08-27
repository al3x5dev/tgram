<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockTable Entity
 * @property string $type
 * @property RichBlockTableCell[] $cells
 * @property bool $is_bordered
 * @property bool $is_striped
 * @property bool $is_compact
 * @property RichText $caption
 */
class RichBlockTable extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'cells' => [RichBlockTableCell::class],
            'caption' => RichText::class,
        ];
    }
}
