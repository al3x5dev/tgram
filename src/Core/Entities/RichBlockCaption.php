<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichBlockCaption Entity
 * @property RichText $text
 * @property RichText $credit
 */
class RichBlockCaption extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'credit' => RichText::class,
        ];
    }
}
