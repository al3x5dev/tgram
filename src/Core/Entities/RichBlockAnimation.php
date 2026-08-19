<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockAnimation Entity
 * @property string $type
 * @property Animation $animation
 * @property bool $has_spoiler
 * @property RichBlockCaption $caption
 */
class RichBlockAnimation extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'animation' => Animation::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
