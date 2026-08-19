<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportElementErrorDataField Entity
 * @property string $source
 * @property string $type
 * @property string $field_name
 * @property string $data_hash
 * @property string $message
 */
class PassportElementErrorDataField extends PassportElementError
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
