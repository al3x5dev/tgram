<?php

namespace Mk4U\TGram\Core\Factories\Keyboard;

use Mk4U\TGram\Core\Entities\CallbackGame;
use Mk4U\TGram\Core\Entities\CopyTextButton;
use Mk4U\TGram\Core\Entities\InlineKeyboardButton;
use Mk4U\TGram\Core\Entities\LoginUrl;
use Mk4U\TGram\Core\Entities\SwitchInlineQueryChosenChat;
use Mk4U\TGram\Core\Entities\WebAppInfo;

class InlineButton implements ButtonInterface
{
    private ?string $text;
    private array $options = [];

    use StyleTrait;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public static function make(string $text): static
    {
        return new static($text);
    }

    public function url(string $url): self
    {
        $this->options['url'] = $url;
        return $this;
    }

    public function callback(string $data): self
    {
        $this->options['callback_data'] = $data;
        return $this;
    }

    public function webApp(WebAppInfo $webAppInfo): self
    {
        $this->options['web_app'] = $webAppInfo;
        return $this;
    }

    public function loginUrl(LoginUrl $loginUrl): self
    {
        $this->options['login_url'] = $loginUrl;
        return $this;
    }

    public function switchInlineQuery(string $query): self
    {
        $this->options['switch_inline_query'] = $query;
        return $this;
    }

    public function switchInlineQueryCurrentChat(string $query): self
    {
        $this->options['switch_inline_query_current_chat'] = $query;
        return $this;
    }

    public function switchInlineQueryChosenChat(SwitchInlineQueryChosenChat $chosenChat): self
    {
        $this->options['switch_inline_query_chosen_chat'] = $chosenChat;
        return $this;
    }

    public function copyText(CopyTextButton $copyText): self
    {
        $this->options['copy_text'] = $copyText;
        return $this;
    }

    public function callbackGame(CallbackGame $callbackGame): self
    {
        $this->options['callback_game'] = $callbackGame;
        return $this;
    }

    public function pay(bool $value = true): self
    {
        $this->options['pay'] = $value;
        return $this;
    }

    public function build(): InlineKeyboardButton
    {
        $data = ['text' => $this->text] + $this->options;
        return new InlineKeyboardButton($data);
    }
}
