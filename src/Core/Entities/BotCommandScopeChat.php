<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotCommandScopeChat Entity
 * @property string $type
 * @property int|string $chat_id
 */
class BotCommandScopeChat extends BotCommandScope
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
