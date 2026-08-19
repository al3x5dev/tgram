<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SentGuestMessage Entity
 * @property string $inline_message_id
 */
class SentGuestMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
