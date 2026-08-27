<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichBlockDocument Entity
 * @property string $type
 * @property InputMediaDocument $document
 * @property RichBlockCaption $caption
 */
class InputRichBlockDocument extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'document' => InputMediaDocument::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
