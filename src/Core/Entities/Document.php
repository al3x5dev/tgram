<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Document Entity
 * @property string $file_id
 * @property string $file_unique_id
 * @property PhotoSize $thumbnail
 * @property string $file_name
 * @property string $mime_type
 * @property int $file_size
 */
class Document extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
