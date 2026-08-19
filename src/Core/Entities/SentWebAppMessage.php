<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SentWebAppMessage Entity
 * @property string $inline_message_id
 */
class SentWebAppMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
