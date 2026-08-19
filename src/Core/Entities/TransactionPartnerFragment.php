<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TransactionPartnerFragment Entity
 * @property string $type
 * @property RevenueWithdrawalState $withdrawal_state
 */
class TransactionPartnerFragment extends TransactionPartner
{
    
    protected function setEntities(): array
    {
        return [
            'withdrawal_state' => RevenueWithdrawalState::class,
        ];
    }
}
