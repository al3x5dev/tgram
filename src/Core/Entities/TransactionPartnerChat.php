<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TransactionPartnerChat Entity
 * @property string $type
 * @property Chat $chat
 * @property Gift $gift
 */
class TransactionPartnerChat extends TransactionPartner
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'gift' => Gift::class,
        ];
    }
}
