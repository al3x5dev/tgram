<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * WriteAccessAllowed Entity
 * @property bool $from_request
 * @property string $web_app_name
 * @property bool $from_attachment_menu
 */
class WriteAccessAllowed extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
