<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockMap Entity
 * @property string $type
 * @property Location $location
 * @property int $zoom
 * @property int $width
 * @property int $height
 * @property RichBlockCaption $caption
 */
class InputRichBlockMap extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
