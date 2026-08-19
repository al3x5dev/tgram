<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * CallbackQuery Entity
 * @property string $id
 * @property User $from
 * @property MaybeInaccessibleMessage $message
 * @property string $inline_message_id
 * @property string $chat_instance
 * @property string $data
 * @property string $game_short_name
 */
class CallbackQuery extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'message' => MaybeInaccessibleMessage::class,
        ];
    }
}
