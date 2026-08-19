<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StickerSet Entity
 * @property string $name
 * @property string $title
 * @property string $sticker_type
 * @property Sticker[] $stickers
 * @property PhotoSize $thumbnail
 */
class StickerSet extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'stickers' => [Sticker::class],
            'thumbnail' => PhotoSize::class,
        ];
    }
}
