<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatShareThemeEmoji Entity
 * @property string $type
 * @property EmojiType[] $emojis
 * @property int $background_backdrop_id
 */
class ChatShareThemeEmoji extends ChatShareTheme
{
    
    protected function setEntities(): array
    {
        return [
            'emojis' => [EmojiType::class],
        ];
    }
}
