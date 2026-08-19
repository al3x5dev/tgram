<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineKeyboardMarkup Entity
 * @property InlineKeyboardButton[] $inline_keyboard
 */
class InlineKeyboardMarkup extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'inline_keyboard' => [InlineKeyboardButton::class],
        ];
    }
}
