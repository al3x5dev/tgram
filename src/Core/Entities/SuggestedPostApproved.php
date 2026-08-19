<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SuggestedPostApproved Entity
 * @property Message $suggested_post_message
 * @property SuggestedPostPrice $price
 * @property int $send_date
 */
class SuggestedPostApproved extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'suggested_post_message' => Message::class,
            'price' => SuggestedPostPrice::class,
        ];
    }
}
