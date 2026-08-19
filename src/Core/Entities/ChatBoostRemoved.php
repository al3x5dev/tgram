<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatBoostRemoved Entity
 * @property Chat $chat
 * @property string $boost_id
 * @property int $remove_date
 * @property ChatBoostSource $source
 */
class ChatBoostRemoved extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'source' => ChatBoostSource::class,
        ];
    }
}
