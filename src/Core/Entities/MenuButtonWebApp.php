<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MenuButtonWebApp Entity
 * @property string $type
 * @property string $text
 * @property WebAppInfo $web_app
 */
class MenuButtonWebApp extends MenuButton
{
    
    protected function setEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
        ];
    }
}
