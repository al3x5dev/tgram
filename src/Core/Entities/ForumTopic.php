<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ForumTopic Entity
 * @property int $message_thread_id
 * @property string $name
 * @property int $icon_color
 * @property string $icon_custom_emoji_id
 * @property bool $is_name_implicit
 */
class ForumTopic extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
