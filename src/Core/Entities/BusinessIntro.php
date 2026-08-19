<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * BusinessIntro Entity
 * @property string $title
 * @property string $message
 * @property Sticker $sticker
 */
class BusinessIntro extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'sticker' => Sticker::class,
        ];
    }
}
