<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockDocument Entity
 * @property string $type
 * @property Document $document
 * @property RichBlockCaption $caption
 */
class RichBlockDocument extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'document' => Document::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
