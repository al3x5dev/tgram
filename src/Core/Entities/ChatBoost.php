<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBoost Entity
 * @property string $boost_id
 * @property int $add_date
 * @property int $expiration_date
 * @property ChatBoostSource $source
 */
class ChatBoost extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'source' => ChatBoostSource::class,
        ];
    }
}
