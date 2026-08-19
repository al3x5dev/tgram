<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * DirectMessagePriceChanged Entity
 * @property bool $are_direct_messages_enabled
 * @property int $direct_message_star_count
 */
class DirectMessagePriceChanged extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
