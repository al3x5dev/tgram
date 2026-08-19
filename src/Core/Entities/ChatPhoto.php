<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ChatPhoto Entity
 * @property string $small_file_id
 * @property string $small_file_unique_id
 * @property string $big_file_id
 * @property string $big_file_unique_id
 */
class ChatPhoto extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
