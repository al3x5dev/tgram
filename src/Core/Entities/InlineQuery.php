<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQuery Entity
 * @property string $id
 * @property User $from
 * @property string $query
 * @property string $offset
 * @property string $chat_type
 * @property Location $location
 */
class InlineQuery extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'location' => Location::class,
        ];
    }
}
