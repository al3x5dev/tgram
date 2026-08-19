<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorTranslationFiles Entity
 * @property string $source
 * @property string $type
 * @property array $file_hashes
 * @property string $message
 */
class PassportElementErrorTranslationFiles extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
