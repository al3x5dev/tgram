<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * Contact Entity
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property int $user_id
 * @property string $vcard
 */
class Contact extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
