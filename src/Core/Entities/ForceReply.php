<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * ForceReply Entity
 * @property bool $force_reply
 * @property string $input_field_placeholder
 * @property bool $selective
 */
class ForceReply extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
