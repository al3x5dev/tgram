<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockPhoto Entity
 * @property string $type
 * @property PhotoSize[] $photo
 * @property bool $has_spoiler
 * @property RichBlockCaption $caption
 */
class RichBlockPhoto extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
            'caption' => RichBlockCaption::class,
        ];
    }
}
