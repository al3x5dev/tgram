<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputSticker Entity
 * @property string $sticker
 * @property string $format
 * @property array $emoji_list
 * @property MaskPosition $mask_position
 * @property array $keywords
 */
class InputSticker extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'mask_position' => MaskPosition::class,
        ];
    }
}
