<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * WidgetQuery Entity
 * @property string $id
 * @property User $from
 * @property Chat $chat
 * @property int $message_id
 * @property string $inline_message_id
 * @property string $chat_instance
 * @property string $chat_type
 * @property WidgetQueryType $type
 * @property string $data
 * @property string $widget_id
 */
class WidgetQuery extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'chat' => Chat::class,
            'type' => WidgetQueryType::class,
        ];
    }
}
