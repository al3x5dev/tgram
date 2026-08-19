<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PollOptionDeleted Entity
 * @property MaybeInaccessibleMessage $poll_message
 * @property string $option_persistent_id
 * @property string $option_text
 * @property MessageEntity[] $option_text_entities
 */
class PollOptionDeleted extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'poll_message' => MaybeInaccessibleMessage::class,
            'option_text_entities' => [MessageEntity::class],
        ];
    }
}
