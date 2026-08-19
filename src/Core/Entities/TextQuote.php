<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TextQuote Entity
 * @property string $text
 * @property MessageEntity[] $entities
 * @property int $position
 * @property bool $is_manual
 */
class TextQuote extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'entities' => [MessageEntity::class],
        ];
    }
}
