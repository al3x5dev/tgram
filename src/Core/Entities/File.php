<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * File Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property int $file_size
 * @property string $file_path
 */
class File extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
