<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputChecklistTask Entity
 * @property int $id
 * @property string $text
 * @property string $parse_mode
 * @property MessageEntity[] $text_entities
 */
class InputChecklistTask extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
        ];
    }
}
