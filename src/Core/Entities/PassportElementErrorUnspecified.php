<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorUnspecified Entity
 * @property string $source
 * @property string $type
 * @property string $element_hash
 * @property string $message
 */
class PassportElementErrorUnspecified extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
