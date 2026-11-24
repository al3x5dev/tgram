<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * EmojiType Entity
 */
class EmojiType extends Entity
{
    public const TYPE_EMOJI = 'emoji';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'emoji' => new EmojiTypeEmoji($this->properties),
            'custom_emoji' => new EmojiTypeCustomEmoji($this->properties),
            default => throw new \InvalidArgumentException('Unknown EmojiType type: ' . $this->type),
        };
    }

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_EMOJI => new EmojiTypeEmoji($data),
            self::TYPE_CUSTOM_EMOJI => new EmojiTypeCustomEmoji($data),
            default => throw new \InvalidArgumentException('Unknown EmojiType type: ' . ($data['type'] ?? 'null')),
        };
    }

}
