<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SuggestedPostDeclined Entity
 * @property Message $suggested_post_message
 * @property string $comment
 */
class SuggestedPostDeclined extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
        ];
    }
}
