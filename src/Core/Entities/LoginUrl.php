<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * LoginUrl Entity
 * @property string $url
 * @property string $forward_text
 * @property string $bot_username
 * @property bool $request_write_access
 */
class LoginUrl extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
