<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockDetails Entity
 * @property string $type
 * @property RichText $summary
 * @property InputRichBlock[] $blocks
 * @property bool $is_open
 */
class InputRichBlockDetails extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'summary' => RichText::class,
            'blocks' => [InputRichBlock::class],
        ];
    }
}
