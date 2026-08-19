<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * TransactionPartnerUser Entity
 * @property string $type
 * @property string $transaction_type
 * @property User $user
 * @property AffiliateInfo $affiliate
 * @property string $invoice_payload
 * @property int $subscription_period
 * @property PaidMedia[] $paid_media
 * @property string $paid_media_payload
 * @property Gift $gift
 * @property int $premium_subscription_duration
 */
class TransactionPartnerUser extends TransactionPartner
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
            'affiliate' => AffiliateInfo::class,
            'paid_media' => [PaidMedia::class],
            'gift' => Gift::class,
        ];
    }
}
