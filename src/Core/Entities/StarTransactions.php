<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * StarTransactions Entity
 * @property StarTransaction[] $transactions
 */
class StarTransactions extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'transactions' => [StarTransaction::class],
        ];
    }
}
