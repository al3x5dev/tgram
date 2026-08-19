<?php

namespace Mk4U\TGram\Core\Factories\Keyboard;

use Mk4U\TGram\Core\Entities\InlineKeyboardMarkup;

class Inline
{
    private array $rows = [];

    use AddRowTrait;

    public function build(): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup(['inline_keyboard' => $this->rows]);
    }
}
