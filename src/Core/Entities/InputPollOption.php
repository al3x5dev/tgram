<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputPollOption Entity
 * @property string $text
 * @property string $text_parse_mode
 * @property MessageEntity[] $text_entities
 * @property InputPollOptionMedia $media
 */
class InputPollOption extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
            'media' => InputPollOptionMedia::class,
        ];
    }
}
