<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatShared Entity
 * @property int $request_id
 * @property int $chat_id
 * @property string $title
 * @property string $username
 * @property PhotoSize[] $photo
 */
class ChatShared extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
        ];
    }
}
