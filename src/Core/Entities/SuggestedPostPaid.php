<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SuggestedPostPaid Entity
 * @property Message $suggested_post_message
 * @property string $currency
 * @property int $amount
 * @property StarAmount $star_amount
 */
class SuggestedPostPaid extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
            'star_amount' => StarAmount::class,
        ];
    }
}
