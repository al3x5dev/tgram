<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatShareTheme Entity
 */
class ChatShareTheme extends Entity
{
    public const TYPE_EMOJI = 'emoji';
    public const TYPE_UNIQUE_GIFT = 'unique_gift';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'emoji' => new ChatShareThemeEmoji($this->properties),
            'unique_gift' => new ChatShareThemeUniqueGift($this->properties),
            default => throw new \InvalidArgumentException('Unknown ChatShareTheme type: ' . $this->type),
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
            self::TYPE_EMOJI => new ChatShareThemeEmoji($data),
            self::TYPE_UNIQUE_GIFT => new ChatShareThemeUniqueGift($data),
            default => throw new \InvalidArgumentException('Unknown ChatShareTheme type: ' . ($data['type'] ?? 'null')),
        };
    }

}
