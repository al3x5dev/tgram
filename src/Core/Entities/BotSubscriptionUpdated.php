<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BotSubscriptionUpdated Entity
 * @property User $user
 * @property string $invoice_payload
 * @property string $state
 */
class BotSubscriptionUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
