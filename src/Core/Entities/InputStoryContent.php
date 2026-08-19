<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputStoryContent Entity
 */
class InputStoryContent extends Entity
{
    
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'photo' => new InputStoryContentPhoto($this->properties),
            'video' => new InputStoryContentVideo($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputStoryContent type: ' . $this->type),
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
            self::TYPE_PHOTO => new InputStoryContentPhoto($data),
            self::TYPE_VIDEO => new InputStoryContentVideo($data),
            default => throw new \InvalidArgumentException('Unknown InputStoryContent type: ' . ($data['type'] ?? 'null')),
        };
    }

}
