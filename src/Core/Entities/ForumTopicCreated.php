<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ForumTopicCreated Entity
 * @property string $name
 * @property int $icon_color
 * @property string $icon_custom_emoji_id
 * @property bool $is_name_implicit
 */
class ForumTopicCreated extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
