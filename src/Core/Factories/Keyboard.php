<?php

namespace Mk4U\TGram\Core\Factories;

use Mk4U\TGram\Core\Entities\ForceReply;
use Mk4U\TGram\Core\Entities\ReplyKeyboardRemove;
use Mk4U\TGram\Core\Factories\Keyboard\Inline;
use Mk4U\TGram\Core\Factories\Keyboard\Reply;

class Keyboard
{
    public static function inline(): Inline
    {
        return new Inline();
    }

    public static function reply(): Reply
    {
        return new Reply();
    }

    public static function remove(): ReplyKeyboardRemove
    {
        return new ReplyKeyboardRemove(['remove_keyboard' => true]);
    }

    public static function forceReply(
        bool $selective = false,
        string $placeholder = ''
    ): ForceReply {
        return new ForceReply([
            'force_reply' => true,
            'selective' => $selective,
            'input_field_placeholder' => $placeholder
        ]);
    }
}
