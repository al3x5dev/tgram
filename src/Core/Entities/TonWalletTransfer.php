<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TonWalletTransfer Entity
 * @property string $transaction_id
 * @property string $peer_address
 * @property string $amount
 * @property string $comment
 */
class TonWalletTransfer extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
