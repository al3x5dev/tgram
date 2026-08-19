<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputContactMessageContent Entity
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $vcard
 */
class InputContactMessageContent extends InputMessageContent
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
