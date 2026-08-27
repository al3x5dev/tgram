<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * EphemeralMessageParameters Entity
 * @property int $receiver_user_id
 * @property string $callback_query_id
 * @property bool $replace_callback_query_message
 */
class EphemeralMessageParameters extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
