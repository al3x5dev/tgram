<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportFile Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $file_size
 * @property int $file_date
 */
class PassportFile extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
