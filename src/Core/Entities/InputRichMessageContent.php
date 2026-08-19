<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputRichMessageContent Entity
 * @property InputRichMessage $rich_message
 */
class InputRichMessageContent extends InputMessageContent
{
    
    protected function setEntities(): array
    {
        return [
            'rich_message' => InputRichMessage::class,
        ];
    }
}
