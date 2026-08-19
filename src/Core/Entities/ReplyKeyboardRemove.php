<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ReplyKeyboardRemove Entity
 * @property bool $remove_keyboard
 * @property bool $selective
 */
class ReplyKeyboardRemove extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
