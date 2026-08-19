<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorTranslationFile Entity
 * @property string $source
 * @property string $type
 * @property string $file_hash
 * @property string $message
 */
class PassportElementErrorTranslationFile extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
