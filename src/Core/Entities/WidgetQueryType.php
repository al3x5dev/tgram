<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * WidgetQueryType Entity
 */
class WidgetQueryType extends Entity
{
    public const TYPE_DATA = 'data';
    public const TYPE_SIGN_DATA = 'sign_data';
    public const TYPE_SENT_TRANSACTION = 'sent_transaction';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'data' => new WidgetQueryTypeData($this->properties),
            'sign_data' => new WidgetQueryTypeSignData($this->properties),
            'sent_transaction' => new WidgetQueryTypeSentTransaction($this->properties),
            default => throw new \InvalidArgumentException('Unknown WidgetQueryType type: ' . $this->type),
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
            self::TYPE_DATA => new WidgetQueryTypeData($data),
            self::TYPE_SIGN_DATA => new WidgetQueryTypeSignData($data),
            self::TYPE_SENT_TRANSACTION => new WidgetQueryTypeSentTransaction($data),
            default => throw new \InvalidArgumentException('Unknown WidgetQueryType type: ' . ($data['type'] ?? 'null')),
        };
    }

}
