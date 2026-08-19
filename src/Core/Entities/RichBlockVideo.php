<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockVideo Entity
 * @property string $type
 * @property Video $video
 * @property bool $has_spoiler
 * @property RichBlockCaption $caption
 */
class RichBlockVideo extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'video' => Video::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
