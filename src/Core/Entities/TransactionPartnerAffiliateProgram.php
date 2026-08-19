<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TransactionPartnerAffiliateProgram Entity
 * @property string $type
 * @property User $sponsor_user
 * @property int $commission_per_mille
 */
class TransactionPartnerAffiliateProgram extends TransactionPartner
{
    
    protected function setEntities(): array
    {
        return [
            'sponsor_user' => User::class,
        ];
    }
}
