<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextMathematicalExpression Entity
 * @property string $type
 * @property string $expression
 */
class RichTextMathematicalExpression extends RichText
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
