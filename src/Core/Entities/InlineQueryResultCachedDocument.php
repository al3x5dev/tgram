<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQueryResultCachedDocument Entity
 * @property string $type
 * @property string $id
 * @property string $title
 * @property string $document_file_id
 * @property string $description
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property InlineKeyboardMarkup $reply_markup
 * @property InputMessageContent $input_message_content
 */
class InlineQueryResultCachedDocument extends InlineQueryResult
{
    
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
