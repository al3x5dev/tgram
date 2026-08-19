<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorSelfie Entity
 * @property string $source
 * @property string $type
 * @property string $file_hash
 * @property string $message
 */
class PassportElementErrorSelfie extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
