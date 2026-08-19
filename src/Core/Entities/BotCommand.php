<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotCommand Entity
 * @property string $command
 * @property string $description
 * @property bool $is_ephemeral
 */
class BotCommand extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
