<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RefundedPayment Entity
 * @property string $currency
 * @property int $total_amount
 * @property string $invoice_payload
 * @property string $telegram_payment_charge_id
 * @property string $provider_payment_charge_id
 */
class RefundedPayment extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
