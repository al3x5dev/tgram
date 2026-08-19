<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichTextBankCardNumber Entity
 * @property string $type
 * @property RichText $text
 * @property string $bank_card_number
 */
class RichTextBankCardNumber extends RichText
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
