<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * EncryptedCredentials Entity
 * @property string $data
 * @property string $hash
 * @property string $secret
 */
class EncryptedCredentials extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
