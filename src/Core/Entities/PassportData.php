<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * PassportData Entity
 * @property EncryptedPassportElement[] $data
 * @property EncryptedCredentials $credentials
 */
class PassportData extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'data' => [EncryptedPassportElement::class],
            'credentials' => EncryptedCredentials::class,
        ];
    }
}
