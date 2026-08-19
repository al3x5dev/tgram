<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockTableCell Entity
 * @property RichText $text
 * @property bool $is_header
 * @property int $colspan
 * @property int $rowspan
 * @property string $align
 * @property string $valign
 */
class RichBlockTableCell extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
