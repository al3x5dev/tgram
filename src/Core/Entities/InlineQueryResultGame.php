<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQueryResultGame Entity
 * @property string $type
 * @property string $id
 * @property string $game_short_name
 * @property InlineKeyboardMarkup $reply_markup
 */
class InlineQueryResultGame extends InlineQueryResult
{
    
    protected function setEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }
}
