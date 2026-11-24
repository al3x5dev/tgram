<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * WidgetQueryTypeSignData Entity
 * @property string $type
 * @property WidgetQueryWallet $wallet
 * @property string $sign_data
 */
class WidgetQueryTypeSignData extends WidgetQueryType
{
    
    protected function setEntities(): array
    {
        return [
            'wallet' => WidgetQueryWallet::class,
        ];
    }
}
