<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * WidgetQueryTypeData Entity
 * @property string $type
 * @property TonWalletCard $wallet_card
 */
class WidgetQueryTypeData extends WidgetQueryType
{
    
    protected function setEntities(): array
    {
        return [
            'wallet_card' => TonWalletCard::class,
        ];
    }
}
