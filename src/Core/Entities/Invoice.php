<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Invoice Entity
 * @property string $title
 * @property string $description
 * @property string $start_parameter
 * @property string $currency
 * @property int $total_amount
 */
class Invoice extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
