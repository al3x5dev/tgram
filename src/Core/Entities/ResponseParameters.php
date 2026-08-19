<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ResponseParameters Entity
 * @property int $migrate_to_chat_id
 * @property int $retry_after
 */
class ResponseParameters extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
