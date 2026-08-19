<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SwitchInlineQueryChosenChat Entity
 * @property string $query
 * @property bool $allow_user_chats
 * @property bool $allow_bot_chats
 * @property bool $allow_group_chats
 * @property bool $allow_channel_chats
 */
class SwitchInlineQueryChosenChat extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
