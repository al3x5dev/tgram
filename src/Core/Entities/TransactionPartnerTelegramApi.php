<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TransactionPartnerTelegramApi Entity
 * @property string $type
 * @property int $request_count
 */
class TransactionPartnerTelegramApi extends TransactionPartner
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
