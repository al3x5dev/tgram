<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * SharedWidgetQuery Entity
 * @property string $id
 * @property User $from
 * @property WidgetQueryType $type
 * @property string $data
 * @property string $widget_id
 */
class SharedWidgetQuery extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'type' => WidgetQueryType::class,
        ];
    }
}
