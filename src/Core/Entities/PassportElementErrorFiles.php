<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorFiles Entity
 * @property string $source
 * @property string $type
 * @property array $file_hashes
 * @property string $message
 */
class PassportElementErrorFiles extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
