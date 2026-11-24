<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Widget Entity
 * @property string $id
 * @property int $width
 * @property int $height
 * @property string $html
 * @property string $public_data
 * @property string $chat_data
 */
class Widget extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
