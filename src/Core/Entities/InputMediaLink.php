<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InputMediaLink Entity
 * @property string $type
 * @property string $url
 */
class InputMediaLink extends InputPollOptionMedia
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
