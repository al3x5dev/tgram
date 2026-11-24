<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * WidgetQueryTypeSentTransaction Entity
 * @property string $type
 * @property WidgetQueryWallet $wallet
 * @property string $msg_hash
 */
class WidgetQueryTypeSentTransaction extends WidgetQueryType
{
    
    protected function setEntities(): array
    {
        return [
            'wallet' => WidgetQueryWallet::class,
        ];
    }
}
