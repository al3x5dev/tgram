<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextBotCommand Entity
 * @property string $type
 * @property RichText $text
 * @property string $bot_command
 */
class RichTextBotCommand extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
