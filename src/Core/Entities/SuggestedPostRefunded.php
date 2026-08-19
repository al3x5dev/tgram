<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SuggestedPostRefunded Entity
 * @property Message $suggested_post_message
 * @property string $reason
 */
class SuggestedPostRefunded extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
        ];
    }
}
