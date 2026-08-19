<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * KeyboardButtonRequestManagedBot Entity
 * @property int $request_id
 * @property string $suggested_name
 * @property string $suggested_username
 */
class KeyboardButtonRequestManagedBot extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
