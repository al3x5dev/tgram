<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * KeyboardButtonRequestUsers Entity
 * @property int $request_id
 * @property bool $user_is_bot
 * @property bool $user_is_premium
 * @property int $max_quantity
 * @property bool $request_name
 * @property bool $request_username
 * @property bool $request_photo
 */
class KeyboardButtonRequestUsers extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
