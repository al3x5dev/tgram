<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorFrontSide Entity
 * @property string $source
 * @property string $type
 * @property string $file_hash
 * @property string $message
 */
class PassportElementErrorFrontSide extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
