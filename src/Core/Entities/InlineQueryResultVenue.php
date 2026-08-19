<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQueryResultVenue Entity
 * @property string $type
 * @property string $id
 * @property float $latitude
 * @property float $longitude
 * @property string $title
 * @property string $address
 * @property string $foursquare_id
 * @property string $foursquare_type
 * @property string $google_place_id
 * @property string $google_place_type
 * @property InlineKeyboardMarkup $reply_markup
 * @property InputMessageContent $input_message_content
 * @property string $thumbnail_url
 * @property int $thumbnail_width
 * @property int $thumbnail_height
 */
class InlineQueryResultVenue extends InlineQueryResult
{
    
    protected function setEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
