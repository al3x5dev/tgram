<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputProfilePhoto Entity
 */
class InputProfilePhoto extends Entity
{
    
    public const TYPE_STATIC = 'static';
    public const TYPE_ANIMATED = 'animated';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'static' => new InputProfilePhotoStatic($this->properties),
            'animated' => new InputProfilePhotoAnimated($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputProfilePhoto type: ' . $this->type),
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
            self::TYPE_STATIC => new InputProfilePhotoStatic($data),
            self::TYPE_ANIMATED => new InputProfilePhotoAnimated($data),
            default => throw new \InvalidArgumentException('Unknown InputProfilePhoto type: ' . ($data['type'] ?? 'null')),
        };
    }

}
