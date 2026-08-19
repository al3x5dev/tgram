<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * InlineQueryResultsButton Entity
 * @property string $text
 * @property WebAppInfo $web_app
 * @property string $start_parameter
 */
class InlineQueryResultsButton extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
        ];
    }
}
