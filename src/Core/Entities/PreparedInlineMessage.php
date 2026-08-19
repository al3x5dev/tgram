<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PreparedInlineMessage Entity
 * @property string $id
 * @property int $expiration_date
 */
class PreparedInlineMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
