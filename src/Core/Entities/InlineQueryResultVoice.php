<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQueryResultVoice Entity
 * @property string $type
 * @property string $id
 * @property string $voice_url
 * @property string $title
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property int $voice_duration
 * @property InlineKeyboardMarkup $reply_markup
 * @property InputMessageContent $input_message_content
 */
class InlineQueryResultVoice extends InlineQueryResult
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
