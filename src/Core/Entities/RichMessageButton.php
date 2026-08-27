<?php

namespace Mk4U\TGram\Core\Entities;

use Mk4U\TGram\Core\Entity;

/**
 * RichMessageButton Entity
 * @property RichText $text
 * @property string $style
 * @property string $url
 * @property string $callback_data
 * @property WebAppInfo $web_app
 * @property LoginUrl $login_url
 * @property string $switch_inline_query
 * @property string $switch_inline_query_current_chat
 * @property SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat
 * @property CopyTextButton $copy_text
 * @property DisabledButton $disabled
 */
class RichMessageButton extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'web_app' => WebAppInfo::class,
            'login_url' => LoginUrl::class,
            'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
            'copy_text' => CopyTextButton::class,
            'disabled' => DisabledButton::class,
        ];
    }
}
