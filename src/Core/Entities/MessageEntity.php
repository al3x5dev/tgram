<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * MessageEntity Entity
 * @property string $type
 * @property int $offset
 * @property int $length
 * @property string $url
 * @property User $user
 * @property string $language
 * @property string $custom_emoji_id
 * @property int $unix_time
 * @property string $date_time_format
 */
class MessageEntity extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
