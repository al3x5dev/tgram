<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichMessage Entity
 * @property InputRichBlock[] $blocks
 * @property string $html
 * @property string $markdown
 * @property InputRichMessageMedia[] $media
 * @property bool $is_rtl
 * @property bool $skip_entity_detection
 */
class InputRichMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'media' => [InputRichMessageMedia::class],
        ];
    }
}
