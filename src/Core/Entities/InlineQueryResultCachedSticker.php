<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQueryResultCachedSticker Entity
 * @property string $type
 * @property string $id
 * @property string $sticker_file_id
 * @property InlineKeyboardMarkup $reply_markup
 * @property InputMessageContent $input_message_content
 */
class InlineQueryResultCachedSticker extends InlineQueryResult
{
    
    protected function setEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
