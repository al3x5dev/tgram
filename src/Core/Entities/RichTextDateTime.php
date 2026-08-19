<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextDateTime Entity
 * @property string $type
 * @property RichText $text
 * @property int $unix_time
 * @property string $date_time_format
 */
class RichTextDateTime extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
